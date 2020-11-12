<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\{Episode, Programme, Archive};
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class EpisodesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
           // $episodes = Episode::leftJoin('programmes', 'programme_id', '=', 'programmes.id')
             //   ->where('programmes.name_en', 'LIKE', "%$keyword%")
             //   ->orwhere('programmes.name_ru', 'LIKE', "%$keyword%")
             //   ->orwhere('programmes.name_am', 'LIKE', "%$keyword%")
             $episodes = Episode::Where('name_en', 'LIKE', "%$keyword%")
                ->orWhere('name_ru', 'LIKE', "%$keyword%")
                ->orWhere('name_am', 'LIKE', "%$keyword%")
                ->orWhere('video_url', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%".date('Y-m-d',strtotime($keyword))."%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orderBy('episodes.created_at')->paginate($perPage);
                
        } else {
            $episodes = Episode::latest()->paginate($perPage);
        }
        $last_date = DB::table('settings')->where('satting_name', 'create_new_week')->first();
        $show_botton = (new Carbon($last_date->satting_value))->addWeek(1)->startOfWeek();
        $show_botton = $show_botton <= Carbon::now();
        return view('admin.episodes.index', compact('episodes', 'show_botton'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $programmes = Programme::where('status',1)->get(['id','name_en']); 
        $selects = [];
        foreach($programmes as $programme)
        {
            $selects[$programme->id] = $programme->name_en;
        }
        return view('admin.episodes.create', compact('programmes', 'selects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'programme_id' => 'required',
			'name_en' => 'required',
			'name_ru' => 'required',
			'name_am' => 'required',
            'status' => 'required'
		]);
        $requestData = $request->all();
      // unset($requestData['mainpic']);
        if (isset($requestData['mainpic'])) {

        $requestData['photo'] = $this->fileUpload($request);
    }
        if($requestData['video_url'] == ''){
            $requestData['status']='picture';
        }
        Episode::create($requestData);

        return redirect('admin/episodes')->with('flash_message', 'Episode added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $episode=DB::table('episodes')->select('episodes.*','programmes.name_en as prog_name')->leftJoin('programmes','programmes.id','=','episodes.programme_id')->where('episodes.id',$id)->first();      
        return view('admin.episodes.show', compact('episode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $episode = Episode::findOrFail($id);
        $programmes = Programme::where('status',1)->get(['id','name_en','name_ru','name_am']);
        $selects = [];
        foreach($programmes as $programme)
        {
            $selects[$programme->id] = $programme->name_en;
        }
        return view('admin.episodes.edit', compact('episode','selects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'programme_id' => 'required',
			'name_en' => 'required',
			'name_ru' => 'required',
			'name_am' => 'required',
            'status' => 'required'
		]);
        $episode = Episode::findOrFail($id);
        $requestData = $request->all();  
        if(isset($requestData['mainpic'])) {
            if(file_exists(public_path("images/Episodes/").$episode->photo)){
                if(unlink(public_path("images/Episodes/").$episode->photo)){
                }
            }
            $requestData['photo'] = $this->fileUpload($request);
            unset($requestData['mainpic']);
        }
         if($requestData['video_url'] == ''){
            $requestData['status']='picture';
        }

        $episode->update($requestData);

        return redirect('admin/episodes')->with('flash_message', 'Episode updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function send_archive ($id){
        $episode = Episode::findOrFail($id);
        Archive::create($episode->toArray());
        Episode::destroy($id);
        return redirect('admin/episodes')->with('flash_message', 'Episode has been sent archive!');
    }
    public function fileUpload(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'mainpic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $width = $request->input('mainpic_width_size_0');
        $height = $request->input('mainpic_height_size_0');
        $x = $request->input('mainpic_file_0_x');
        $y = $request->input('mainpic_file_0_y');
        $x = $x == 0 ? 1 : $x;
        $y = $y == 0 ? 1 : $y;
        $index = $request->input('mainpic_index_0');
        $indexHeight = $request->input('mainpic_indexHeight_0');

        $naturalWidth = $request->input('mainpic_naturalWidth_0');
        $naturalHeight = $request->input('mainpic_naturalHeight_0');

        $mainpic         = $request->file('mainpic');
        $imagename       = uniqid(time()) . '.' . $mainpic->getClientOriginalExtension();
        $destinationPath = public_path("images/Episodes/");

        $img = Image::make($mainpic);
        if($naturalWidth < $width*$index + $x*$index){
            $width = $naturalWidth - $x*$index;
        } else {
             $width =$width*$index;
        }

        if($naturalHeight < $height*$indexHeight + $y*$indexHeight){
            $height = $naturalHeight - $y*$indexHeight;
        } else {
           $height = $height * $indexHeight;
        }

        $img->crop(round($width) , round($height), round($x*$index), round($y*$indexHeight));
        $img->fit(round($width) , round($height));
        $img->save($destinationPath.$imagename);
        
        return $imagename;
    }

    public function create_new_week(){
        $start = Carbon::now()->subWeek(1)->startOfWeek()->format('Y/m/d');
        $end = Carbon::now()->subWeek(1)->endOfWeek()->format('Y/m/d');
        $last_date = DB::table('settings')->where('satting_name', 'create_new_week')->first();
        $show_botton = (new Carbon($last_date->satting_value))->addWeek(1)->startOfWeek();
        if($show_botton <= Carbon::now()){
            $episode = Episode::whereDate('date', '>=', $start)->whereDate('date', '<=', $end)->get();
            if(count($episode)) {
                foreach ($episode as $key => $value) {
                    $new_episode = new Episode();
                    $new_episode->programme_id = $value->programme_id;
                    $new_episode->date = (new Carbon($value->date))->addWeek(1);
                    $new_episode->status = $value->status;
                    $new_episode->photo = $value->photo;
                    $new_episode->save();
                }
                DB::table('settings')->where('satting_name','create_new_week')->update(['satting_value' => (new Carbon($end))->addWeek(1)]);
            }
        }
        
        return redirect('/admin/episodes');
    }
    public function destroy($id)
    {
        $episode = Episode::findOrFail($id);
        if(file_exists(public_path("images/Episodes/").$episode->photo)){
                if(@unlink(public_path("images/Episodes/").$episode->photo)){
                }
             }
        Episode::destroy($id);
        return redirect('admin/episodes')->with('flash_message', 'Episode deleted!');
    }
}
