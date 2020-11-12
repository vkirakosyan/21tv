<?php

namespace App\Http\Controllers\User;

use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Top_Image;
use App\News;
use App\Programme;
use App\Question;
use App\Poll;
use App\PollsCandidate;
use App\Photosession;
use Carbon\Carbon;
use App\Episode;
use App\About;
use App\AboutUs;
use App\VacantJob;
use Mail;
use App\ImagePolls;
use App\Archive;
use DB;

class UserViewController extends Controller
{
	private $activ_day;
	// dashboard data
    private function getTopImage () {
    	return Top_Image::All()->first();
    }
    private function getNewsDashbord () {
    	return News::Select(['header_'.App::getLocale().' as  header','first_text_'.App::getLocale().' as  first_text','updated_at', 'mainpic','id'])
        ->orderBy('created_at','desc')
        ->limit(8)
        ->get();
    }
    private function getNews ($id) {
    	return News::Select(['header_'.App::getLocale().' as  header','first_text_'.App::getLocale().' as  first_text',
    		'text_'.App::getLocale().' as  text',
    		'mainpic','id','video_url','photo','updated_at','fasc_status'])->findOrFail($id);
    }
    private function getAllNews () {
    	$perPage = 12;
    	return News::Select(['header_'.App::getLocale().' as  header','first_text_'.App::getLocale().' as  first_text',
    		'text_'.App::getLocale().' as  text',
    		'mainpic','id','video_url','photo','updated_at','fasc_status'])->latest()->paginate($perPage);
    }
    private function getProgrammeDashbord () {
    	return Programme::Select(['name_'.App::getLocale().' as  name','photo','id','is_picture'])->where('status',1)
        ->orderBy('sort','asc')
        ->limit(6)
        ->get();
    }
    private function getQuestionsDashbordFirst () {
    	return Question::Where('active', '1')
        ->select(['question_'.App::getLocale().' as  question','updated_at', 'type','id','active'])
        ->where(function ($query){
            return $query->where('type', 'yesno')
            ->orWhere('type', 'multiplechoice');
        })->first();
        
       
    }
    private function getPollsDashbord ($query) {
    	return Poll::Where('type','=',$query)
    	->take(10)
    	->get(['options_'.App::getLocale().' as  options','updated_at', 'type','id','status']);
    }
    private function getPollsCandidateDashbord ($query) {
    	return PollsCandidate::Where('type','=',$query)
    	->get(['options_'.App::getLocale().' as  options','updated_at', 'type','id']);
    }
    private function getQuestionsDashbord () {
    	return Question::Where('type','=','text')
    	->where('active','=','1')
    	->get(['question_'.App::getLocale().' as  question','updated_at', 'type','id'])
    	->first();
    }
    // programs data
    private function getProgramme () {
    	$perPage = 12;
    	return Programme::Select(['name_'.App::getLocale().' as  name','photo','id','is_picture'])->where('status',1)->orderBy('sort', 'asc')->paginate($perPage);
    }
    private function getProgrammeMore ($id) {
    	$perPage = 12;
    	$episodes = Episode::Select(['name_'.App::getLocale().' as  name',
    							'video_url',
    							'id',
    							'date',
                                'photo',
                                'status',
    							'programme_id'])
    	                ->Where( 'programme_id', '=', $id)->where('status','episode')
                        ->whereNotNull('video_url')
    					->orderBy('date', 'DESC')
    					->paginate($perPage);
   		foreach ($episodes as $value) {
   			 $value->programme;
   		}
   		return $episodes;
    }
    // Episode data
    private function getEpisode ($first = 0, $last = 1) {
    	$perPage = 20;
    	return Episode::Select(['name_'.App::getLocale().' as  name',
    							'video_url',
                                'status',
                                'photo',
    							'date'])
    	                ->Where( 'date', '>=', Carbon::today()->addDays($first))
    					->where( 'date', '<=', Carbon::today()->addDays($last))
    					->paginate($perPage);
    }
     private function getAllEpisode () {
     	$perPage = 20;
     	$episode = Episode::Select(['name_'.App::getLocale().' as  name',
    							'video_url',
    							'date',
                                'photo',
    							'id',
                                'status',
    							'programme_id'])->orderBy('created_at','desc')->paginate($perPage);
     	foreach ($episode as $value) {
     		$value->programme;
     	}
     	return $episode;
     }
  /*   private function getAllArchive () {
        $perPage = 20;
        $episode = Archive::Select(['name_'.App::getLocale().' as  name',
                                'video_url',
                                'date',
                                'id',
                                'photo',
                                'status',
                                'programme_id'])->orderBy('created_at','desc')->groupBy('programme_id')->paginate($perPage);
        foreach ($episode as $value) {
            $value->programme;
        }
        return $episode;
     }*/
     public function getAllArchive(){
             $perPage = 20;
             $episode=DB::table('programmes')
             ->Join('archives', 'programmes.id', '=', 'archives.programme_id')->select('programmes.photo','programmes.name_'.App::getLocale().' as  name','programmes.id','archives.programme_id')
            ->groupBy('programmes.id')->paginate($perPage);
           return $episode;
     }
        
               
    private function getsearchEpisode ($search) {
    	$perPage = 20;
     	$episode = Archive::Select(['name_'.App::getLocale().' as  name',
    							'video_url',
    							'date',
    							'id',
                                'photo',
                                'status',
    							'programme_id'])
                            ->Where('name_'.App::getLocale(), 'like', "%".$search['programme']."%")
                           ->Where('date', '<=', Carbon::createMidnightDate($search['year'], $search['month'], $search['day']))
     	                   ->paginate($perPage);    
     	foreach ($episode as $value) {
     		$value->programme;
     	}
        $episode->programme=$search['programme'];
        $episode->year=$search['year'];
        if($search['month'] != null){
        $episode->month=date("F", mktime(0, 0, 0, $search['month'], 10));
        }
        
        $episode->day=$search['day'];
        //dd($episode);
     	return $episode;
    }
    private function getepisodesMore ($id) {
    	$perPage = 20;
    	$episodes = Episode::Select(['name_'.App::getLocale().' as  name',
    							'video_url',
    							'id',
    							'date',
                                'photo',
                                'status',
    							'programme_id'])
    	                ->Where([
                            'programme_id' => $id,
                            'status'       => 'episode',
                        ])
                        ->whereNotNull('video_url')
    	                ->orderBy('date', 'desc')
    					->paginate($perPage);
    	foreach ($episodes as $value) {
   			 $value->programme;
   		}
   		return $episodes;			
    }

        private function getanonsMore ($id) {
        $perPage = 20;
        $episodes = Episode::Select(['name_'.App::getLocale().' as  name',
                                'video_url',
                                'id',
                                'date',
                                'photo',
                                'status',
                                'programme_id'])
                        ->Where('programme_id','=',$id)->where('status','anons')
                        ->orderBy('date', 'desc')
                        ->paginate($perPage);
        foreach ($episodes as $value) {
             $value->programme;
        }
        return $episodes;           
    }
    private function getThisEpisodes ($id) {
    	$episodes = Episode::Select(['name_'.App::getLocale().' as  name',
    							'video_url',
    							'id',
    							'date',
                                'photo',
                                'status',
    							'programme_id'])
    	                ->findOrFail($id);
   		$episodes->programme;
   		return $episodes;			
    }
    // private function getSchedule ($first = 0, $last = 1, $day = '' ) {
    // /*	$perPage = 100;*/

    // 	if($day == '') {
    // 		$day = Carbon::today();
    // 	}
    // 	$first_date = new Carbon($day);
    // 	$last_date = new Carbon($day);
    // 	$episodes = Episode::Join('programmes','episodes.programme_id = programmes.id')->select(['programmes.photo','programmes.name_'.App::getLocale().' as  prog_name',
    // 							'episodes.id',
    // 							'date',
    //                             'episodes.status',
    // 							'programme_id'])
    // 	                ->Where( 'date', '>=', $first_date->addDays($first))
    // 					->where( 'date', '<=', $last_date->addDays($last))
    // 					->orderBy('date', 'asc')
    // 					->get();
   	// 	foreach ($episodes as $value) {
   	// 		 $value->programme;
   	// 	}
    //      dd($episodes);
   	// 	return $episodes;


    // }



   private function getSchedule ($first = 0, $last = 1, $day = '' ) {
        if($day == '') {
            $day = Carbon::today();
        }
        $first_date = new Carbon($day);
        $last_date = new Carbon($day);
        $episodes = DB::table('episodes')
             ->Join('programmes', 'programmes.id', '=', 'episodes.programme_id')->select(['programmes.photo','programmes.name_'.App::getLocale().' as  prog_name','programmes.id','episodes.programme_id',
                                'episodes.id',
                                'date',
                                'episodes.status',
                                'programme_id'])
                        ->Where( 'date', '>=', $first_date->addDays($first))
                        ->where( 'date', '<=', $last_date->addDays($last))
                        ->orderBy('date', 'asc')
                        ->get();
        return $episodes;
    }
    // Photosession data
    private function getPhotosession () {
    	$perPage =9;
    	return Photosession::Select(['title_'.App::getLocale().' as  title', 'mainpic', 'id'])->latest()->paginate($perPage);
    }
    private function getPhotosessionMore ($id) {
    	return Photosession::Where('id', '=', $id)->get(['title_'.App::getLocale().' as  title',
    													'mainpic',
    													'id',
    													'photos',
    													'date'])
    	      	      	      	      	      	  ->first();
    }
    // conttact data
    private function getContact () {
    	return About::All(['address_'.App::getLocale().' as  address',
    					'phone',
    					'facebook',
    					'instagram',
    					'youtube',
    					'maps',
    					'email'])->first();
    }
    // About us data
    private function getAbout () {
    	return AboutUs::All(['header1_'.App::getLocale().' as  header1',
    						'header2_'.App::getLocale().' as  header2',
    						'text1_'.App::getLocale().' as  text1',
    						'text2_'.App::getLocale().' as  text2', 'mainpic'])->first();
    }
    // Vacant Jobs data
    private function getVacantJob () {
    	$perPage = 9;
    	return VacantJob::Select(['header_'.App::getLocale().' as  header',
    							'small_text_'.App::getLocale().' as  small_text',
    							'text_'.App::getLocale().' as  text'])->latest()->paginate($perPage);
    }
    private function getDays ($day = 7) {
    	$data = [];
        $day = $day<7 ? 7 : $day;
    	if(Carbon::now()->format('lang_url') == 'Monday'){
	    	for ($i = 0; $i < $day; $i++) {
	    		$data [] =	Carbon::now()->addDays($i)->format('l F j');
	    	}
	    } else {
	    	for ($i = 0; $i < $day; $i++) {
	    		$data [] =	Carbon::now()->previous(Carbon::MONDAY)->addDays($i)->format('l F j');
	    	}
	    }
    	return $data;
    }
     private function getScheduleLastDay (){
		$episode = Episode::Select(['date'])->whereDate('date','>',Carbon::today())->orderBy('date', 'DESC')->first();
		$day = Carbon::today()->format('d');
		$month = Carbon::today()->format('m');
		$last_day = 0;
		if ($episode){
			$last_day = new Carbon($episode->date);
			$last_mount = $last_day->format('m');
			$last_day = $last_day->format('d');
			for($i = $month; $i < $last_mount; $i++ ){
				$last_day += 31;
			}

		} else {
			$last_day = Carbon::today()->addDays(7)->format('d');
		}
        return $last_day;
		//return  $last_day - $day + (7 - (Carbon::today()->format('w') - 1));
    }

    public function index ($lang = 'am') {
    	App::setLocale($lang);
    	$data = [];
    	$data['top_image'] = $this->getTopImage ();
    	$data['news'] = $this->getNewsDashbord ();
    	$data['contact'] = $this->getContact ();
    	$data['lang_url'] = route ('index');
    	$data['programme'] = $this->getProgrammeDashbord ();
    	$data['questions_first'] = $this->getQuestionsDashbordFirst ();
    	$data['polls_hot10'] = $this->getPollsDashbord ('hot10');
    	$data['polls_hat10'] = $this->getPollsDashbord ('hay10');
    	$data['candidate_hot10'] = $this->getPollsCandidateDashbord ('hot10');
    	$data['candidate_hat10'] = $this->getPollsCandidateDashbord ('hay10');
    	$data['questions_text'] = $this->getQuestionsDashbord ();
        $data['polls_image'] = ImagePolls::where('type', 'hayhot')->first();
        $data['polls_image_yesno'] = ImagePolls::where('type', 'yes_no')->first();
        $data['polls_image_text'] = ImagePolls::where('type', 'text')->first();
    	return view('user.dashboard', ['data' => $data, 'dashboard'=> true]);
    }
    public function news ($lang = 'am') {
    	App::setLocale($lang);
    	$data = [];
    	$data['contact'] = $this->getContact ();
    	$data['lang_url'] = route('news');
    	$news = $this->getAllNews();

    	foreach ($news as $key =>$value) {
    		$arr = explode(" ", $value->first_text);
    		$arr = array_slice($arr, 0, 15);
    		$news [$key]->first_text = implode(" ",$arr);
    	}
    	$data['news'] = $news;
    	return view('user.news', ['data' => $data]);
    }
    public function programme ($lang = 'am') {
    	App::setLocale($lang);
    	$data = [];
    	$data['programme'] = $this->getProgramme ();
    	$data['contact'] = $this->getContact ();
    	$data['lang_url'] = route ('programme');
    	return view('user.programme', ['data' => $data]);
    }
    public function photosession ($lang = 'am') {
    	App::setLocale($lang);
    	$data = [];
    	$data['photos'] = $this->getPhotosession ();
    	$data['contact'] = $this->getContact ();
    	$data['lang_url'] = route ('photosession');
    	return view('user.photosessions', ['data' => $data]);
    }
    public function gallery_more ($id, $lang = 'am') {
    	App::setLocale($lang);
    	$data = [];
    	$data['photos'] = $this->getPhotosessionMore ($id);
    	$data['contact'] = $this->getContact ();
    	$data['lang_url'] = route ('gallerymore',$id);
    	return view('user.gallery_more', ['data' => $data]);
    }
    public function contact ($lang = 'am') {
    	App::setLocale($lang);
    	$data = [];
    	$data['contact'] = $this->getContact ();
    	$data['lang_url'] = route ('contact');
    	return view('user.contact', ['data' => $data]);
    }
    public function about_us ($lang = 'am') {
    	App::setLocale($lang);
    	$data = [];
    	$data['contact'] = $this->getContact ();
    	$data['about_us'] = $this->getAbout ();
    	$data['lang_url'] = route ('about_us');
    	return view('user.about_us', ['data' => $data]);
    }
    public function work ($lang = 'am') {
    	App::setLocale($lang);
    	$data = [];
    	$data['contact'] = $this->getContact ();
    	$data['work'] = $this->getVacantJob ();
    	$data['lang_url'] = route ('work');
    	return view('user.work', ['data' => $data]);
    }
    public function episode ($lang = 'am') {
    	App::setLocale($lang);
    	$this->activ_day = Carbon::now()->format('l F j');
    	$data = [];
    	$data['contact'] = $this->getContact ();

    	$data['schedule'] = $this->getSchedule ();
        $day = $this->getScheduleLastDay();
        //dd($day);
    	$data['date_time'] = $this->getDays($day < 7? 7 : $day);
    	$data['activ_day'] = $this->activ_day;
    	$data['now'] = Carbon::now('UTC')->setTimezone('+4:00');
    	$data['lang_url'] = route ('schedule');
         //dd($data);
    	return view('user.schedule', ['data' => $data]);
    }
    public function episode_days ($days,$lang = 'am') {
    	App::setLocale($lang);
    	$this->activ_day = $days;
    	$data = [];
    	$data['contact'] = $this->getContact ();
    	$data['schedule'] = $this->getSchedule (0, 1, $this->activ_day);
    	$data['date_time'] = $this->getDays ($this->getScheduleLastDay ());
    	$data['activ_day'] = $this->activ_day;
    	$data['now'] = Carbon::now('UTC')->setTimezone('+4:00');
    	$data['lang_url'] = route ('schedule_day', $this->activ_day);
    	return view('user.schedule_content', ['data' => $data]);
    }
    public function program_more ($programme_id, $id = 'null', $lang = 'am') {
        if($id == 'am' || $id == 'ru' || $id == 'en'){
            $lang = $id;
            $id = 'null'; 
        }
        App::setLocale($lang);
        $data = [];
    	$data['contact'] = $this->getContact ();
    	$data['date_time'] = $this->getDays ();
    	$data['episode'] = $this->getepisodesMore($programme_id);
        $data['page']='episode';
    	$data['this_episode'] = [];
    	if ($id === 'null') {
    		$data['this_episode'] = $data['episode'][0];
    	} else {
	    	$data['this_episode'] = $this->getThisEpisodes ($id);
	    }
    	$data['now'] = Carbon::now('UTC')->setTimezone('+4:00');
    	$data['lang_url'] = route ('program_more', [$programme_id,$id]);
        $data['programme_id']=$programme_id;
    	return view('user.program_more', ['data' => $data]);
    }
       public function anons_more ($programme_id, $id = 'null', $lang = 'am') {
        if($id == 'am' || $id == 'ru' || $id == 'en'){
            $lang = $id;
            $id = 'null'; 
        }
        App::setLocale($lang);
        $data = [];
        $data['contact'] = $this->getContact ();
        $data['date_time'] = $this->getDays ();
        $data['episode'] = $this->getanonsMore($programme_id);
        $data['page']='anons';
        $data['this_episode'] = [];
        if ($id === 'null') {
            $data['this_episode'] = $data['episode'][0];
        } else {
            $data['this_episode'] = $this->getThisEpisodes ($id);
        }
        $data['programme_id']=$programme_id;
        $data['now'] = Carbon::now('UTC')->setTimezone('+4:00');
        $data['lang_url'] = route ('program_more', [$programme_id,$id]);
        return view('user.program_more', ['data' => $data]);
    }
    public function episods_view ($id, $lang = 'am') {
    	App::setLocale($lang);
    	$data = [];
    	$data['contact'] = $this->getContact ();
    	$data['date_time'] = $this->getDays ();
    	$data['episodes'] = $this->getProgrammeMore($id);
        $data['page']='episode';
    	$data['now'] = Carbon::now('UTC')->setTimezone('+4:00');
    	$data['lang_url'] = route ('episods_view',$id);
    	return view('user.episods_view', ['data' => $data]);
    }
        public function anons_view ($id, $lang = 'am') {
        App::setLocale($lang);
        $data = [];
        $data['contact'] = $this->getContact ();
        $data['date_time'] = $this->getDays ();
        $data['episodes'] = $this->getanonsMore($id);
        $data['page']='anons';
        $data['now'] = Carbon::now('UTC')->setTimezone('+4:00');
        $data['lang_url'] = route ('episods_view',$id);
        return view('user.episods_view', ['data' => $data]);
    }
    public function archive ($lang = 'am') {
    	App::setLocale($lang);
    	$data = [];
    	$data['contact'] = $this->getContact ();
    	$data['date_time'] = $this->getDays ();
    	$data['episodes'] = $this->getAllArchive();
    	$data['now'] = Carbon::now('UTC')->setTimezone('+4:00');
    	$data['lang_url'] = route ('archive');
        //dd($data['episodes']);
    	return view('user.archive', ['data' => $data]);
    }
    public function news_more ($id, $lang = 'am') {
    	App::setLocale($lang);
    	$data = [];
    	$data['contact'] = $this->getContact();
    	$data['lang_url'] = route('news_more',$id);
    	$data['news'] = $this->getNews ($id);

    	return view('user.news_more', ['data' => $data]);
    }
    public function archive_search ($lang = 'am',Request $request) {
    	App::setLocale($lang);
    	$search = $request->all();
    	$data = [];
    	$data['contact'] = $this->getContact ();
    	$data['date_time'] = $this->getDays ();
    	$data['episodes'] = $this->getsearchEpisode($search);
        $data['type']='search';
    	$data['now'] = Carbon::now('UTC')->setTimezone('+4:00');
    	$data['lang_url'] = route ('archive');
    	return view('user.archive', ['data' => $data]);
    }
    public function sendEmail (Request $request) {
    	$user = $request->all();
    	Mail::send('user.emails', ['user' => $user], function ($m) use ($user) {
            $m->from(env('MAIL_USERNAME'), 'Your Application');
            $m->to($user['email'], $user['name'])->subject('Your Reminder!');
        });
    	return redirect()->back();
    }
    public function search_schedule ($program, $id = null, $lang = 'am') {
        if($id == 'am' || $id == 'ru' || $id == 'en'){
            $lang = $id;
            $id = null; 
        } 
        App::setLocale($lang);
        $data = [];
        $data['contact'] = $this->getContact ();
        $data['schedule'] = $this->getProgrammeMore($program);
        $data['lang_url'] = route ('search_schedule', $program, $id);
        return view('user.search_schedule', ['data' => $data]);
    }
        private function getThisEpisodesArchive ($id) {
        $episodes = Archive::Select(['name_'.App::getLocale().' as  name',
                                'video_url',
                                'id',
                                'date',
                                'photo',
                                'status',
                                'programme_id'])
                        ->findOrFail($id);
        $episodes->programme;
        return $episodes;
    }
      private function getarchiveMore ($id) {
        $perPage = 20;
        $episodes = Archive::Select(['name_'.App::getLocale().' as  name',
                                'video_url',
                                'id',
                                'date',
                                'photo',
                                'status',
                                'programme_id'])
                        ->Where('programme_id','=',$id)
                        ->orderBy('date', 'desc')
                        ->paginate($perPage);
        foreach ($episodes as $value) {
             $value->programme;
        }
        return $episodes;           
    }
       public function archive_more ($programme_id, $id = 'null', $lang = 'am') {
        if($id == 'am' || $id == 'ru' || $id == 'en'){
            $lang = $id;
            $id = 'null'; 
        }
        App::setLocale($lang);
        $data = [];
        $data['contact'] = $this->getContact ();
        $data['date_time'] = $this->getDays ();
        $data['episode'] = $this->getarchiveMore($programme_id);
        $data['page']='archive';
        $data['this_episode'] = [];
        if ($id === 'null') {
            $data['this_episode'] = $data['episode'][0];
        } else {
            $data['this_episode'] = $this->getThisEpisodesArchive ($id);
        }
        $data['now'] = Carbon::now('UTC')->setTimezone('+4:00');
        $data['lang_url'] = route ('program_more', [$programme_id,$id]);
        return view('user.program_more', ['data' => $data]);
    }
        private function getProgrammeMoreArchive ($id) {
        $perPage = 10;
        $episodes = Archive::Select(['name_'.App::getLocale().' as  name',
                                'video_url',
                                'id',
                                'date',
                                'photo',
                                'status',
                                'programme_id'])
                        ->Where( 'programme_id', '=', $id)
                        ->whereNotNull('video_url')
                        ->orderBy('date', 'DESC')
                        ->paginate($perPage);
        foreach ($episodes as $value) {
             $value->programme;
        }
        return $episodes;
    }
   public function archive_view ($id, $lang = 'am') {
        App::setLocale($lang);
        $data = [];
        $data['contact'] = $this->getContact ();
        $data['date_time'] = $this->getDays ();
        $data['page']='archive';
        $data['episodes'] = $this->getProgrammeMoreArchive($id);
        $data['now'] = Carbon::now('UTC')->setTimezone('+4:00');
        $data['lang_url'] = route ('episods_view',$id);
        $data['page']='archive';
        return view('user.episods_view', ['data' => $data]);
    }
}

