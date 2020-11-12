<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Programme;
use App\Episode;
use App\Photosession;
use App\Archive;
use App;

class SearchController extends Controller
{

    private function newsSearchData ($data) {
        $news = News::Select([  'header_'.App::getLocale().' as  title',
                                'first_text_'.App::getLocale().' as  description',
                                'mainpic','id','updated_at'])
                    ->Where('header_en','like',"%$data%")
                    ->orWhere('header_ru','like',"%$data%")
                    ->orWhere('header_am','like',"%$data%")
                    ->orWhere('first_text_am','like',"%$data%")
                    ->orWhere('first_text_ru','like',"%$data%")
                    ->orWhere('first_text_en','like',"%$data%")
                    ->orWhere('text_am','like',"%$data%")
                    ->orWhere('text_ru','like',"%$data%")
                    ->orWhere('text_en','like',"%$data%")
                    ->orderBy('updated_at', 'DESC')
                    ->get();
        foreach ($news as $key =>$value) {
            $arr = explode(" ", $value->description);
            $arr = array_slice($arr, 0, 15);
            $news [$key]->description = implode(" ",$arr);
        }

    	return $news;
    }
    public function programmeSearchData ($data) {
        $programme = Programme::Select(['name_'.App::getLocale().' as  title',
                            'updated_at as  description',
                            'id','updated_at'])
                    ->Where('name_en','like',"%$data%")
                    ->orWhere('name_ru','like',"%$data%")
                    ->orWhere('name_am','like',"%$data%")
                    ->orWhere('updated_at','like',"%".date('Y-m-d',strtotime($data))."%")
                    ->orderBy('updated_at', 'DESC')
                    ->get();
        
        return $programme;
    }
    public function episodeSearchData ($data) {
        $episode = Episode::Select(['name_'.App::getLocale().' as  title',
                            'date as  description',
                            'id','updated_at','programme_id'])
                    ->Where('name_en','like',"%$data%")
                    ->orWhere('name_ru','like',"%$data%")
                    ->orWhere('name_am','like',"%$data%")
                    ->orWhere('date','like',"%".date('Y-m-d',strtotime($data))."%")
                    ->orderBy('date', 'DESC')
                    ->get();
        
        return $episode;
    }
    public function photosessionSearchData ($data) {
        $photosession = Photosession::Select(['title_'.App::getLocale().' as  title',
                            'date as  description',
                            'id','updated_at'])
                    ->Where('title_en','like',"%$data%")
                    ->orWhere('title_ru','like',"%$data%")
                    ->orWhere('title_am','like',"%$data%")
                    ->orWhere('date','like',"%".date('Y-m-d',strtotime($data))."%")
                    ->orderBy('date', 'DESC')
                    ->get();
        return $photosession;
    }
    public function schedule (Request $request) {
    	$data = $request->input('search');
        $programme = $this->programmeSearchData ($data);
        $schedule = $this->episodeSearchData ($data);
        return ['category' => ['programme', 'schedule'],
                'data' =>[
                        'programme' => $programme,
                        'schedule' =>$schedule
                    ],
                'return_page' => [
                    'programme' => '/search_schedule/',
                    'schedule' => '/search_schedule/'
                    ]
                ];
    }
    public function news (Request $request) {
        $data = $request->input('search');
        $news = $this->newsSearchData ($data);
        return ['data' => $news,'return_page' => '/news_more/'];
    }
    public function programme (Request $request) {
        $data = $request->input('search');
        $programme = $this->programmeSearchData ($data);
        return ['data' => $programme,'return_page' => '/program_more/' ];
    }
    public function photosession (Request $request) {
        $data = $request->input('search');
        $photosession = $this->photosessionSearchData ($data);
        return ['data' => $photosession,'return_page' => '/gallery_more/' ];
    }

    public function dashboard (Request $request) {
        $data = $request->input('search');
        $news = $this->newsSearchData ($data);
        $programme = $this->programmeSearchData ($data);
        $photosession = $this->photosessionSearchData ($data);
        return ['category' => ['news', 'programme', 'photosession'],
                'data' =>[
                        'news' =>$news,
                        'programme' => $programme,
                        'photosession' => $photosession
                    ],
                'return_page' => [
                    'news' => '/news_more/',
                    'programme' => '/program_more/',
                    'photosession' => '/gallery_more/'
                    ]
                ];
    }
    public function archiv_search_name (Request $request) {
        $data = $request->input('search');
        $episodesName = Archive::Select(['name_'.App::getLocale().' as  name',])
                ->Where('name_en', 'like', "%$data%")
                ->orWhere('name_ru', 'like', "%$data%")
                ->orWhere('name_am', 'like', "%$data%")
                ->take(30)
                ->get();
        return $episodesName;
    }
    
}
