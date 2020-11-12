<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\{News, Category};
use Illuminate\Http\Request;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class NewsController extends Controller
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
            $news = News::where('text_en', 'LIKE', "%$keyword%")
                ->orWhere('header_en', 'LIKE', "%$keyword%")
                ->orWhere('header_ru', 'LIKE', "%$keyword%")
                ->orWhere('header_am', 'LIKE', "%$keyword%")
                ->orWhere('text_ru', 'LIKE', "%$keyword%")
                ->orWhere('text_am', 'LIKE', "%$keyword%")
                ->orWhere('mainpic', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('video_url', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $news = News::latest()->paginate($perPage);
        }

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $categories = Category::get(['id','name_en']); 
        // $selects = [];
        // foreach($categories as $category)
        // {
        //     $selects[$category->id] = $category->name_en;
        // }
        return view('admin.news.create'/*, compact('selects')*/);
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
            // 'category_id' => 'required',
            'header_en'   => 'required',
            'header_ru'   => 'required',
            'header_am'   => 'required',
            'first_text_en'     => 'required',
            'first_text_ru'     => 'required',
            'first_text_am'     => 'required',
            'mainpic'     => 'required'
		]);
        $requestData = $request->all();
        $requestData['mainpic'] = $this->fileUpload($request);
        if(array_key_exists('photo', $requestData))
        {
            $requestData['photo'] = $this->filesUpload($request);
        }

        News::create($requestData);

        return redirect('admin/news')->with('flash_message', 'News added!');
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
        $news = News::findOrFail($id);

        return view('admin.news.show', compact('news'));
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
        $news = News::findOrFail($id);
        // $categories = Category::get(['id','name_en']); 
        // $selects = [];
        // foreach($categories as $category)
        // {
        //     $selects[$category->id] = $category->name_en;
        // }

        return view('admin.news.edit', compact('news' /*,'selects'*/));
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
            // 'category_id' => 'required',
            'header_en'   => 'required',
            'header_ru'   => 'required',
            'header_am'   => 'required',
            'first_text_en'     => 'required',
            'first_text_ru'     => 'required',
            'first_text_am'     => 'required'
		]);
        $news = News::findOrFail($id);
        $requestData = $request->all();
        // dd($requestData);
        if(array_key_exists('mainpic', $requestData))
        {
            $requestData['mainpic'] = $this->fileUpload($request);
        }
        if(array_key_exists('photo', $requestData))
        {
            $photo = [];
            foreach (json_decode($this->filesUpload($request)) as $value) {
               $photo[] = $value; 
            }
            if(isset($news['photo'])) {
            foreach (json_decode($news['photo']) as $value) {
                $photo[] = $value;
            }
        }
            $requestData['photo'] = json_encode($photo);
        }
        
        $news->update($requestData);

        return redirect('admin/news')->with('flash_message', 'News updated!');
    }
    public function faceActivet (Request $request, $id) {
        $requestData = $request->all();
        $news = News::find($id);
        $news->update($requestData);
        return redirect('admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if(file_exists(public_path("images/News/").$news['mainpic'])){
            unlink(public_path("images/News/").$news['mainpic']);
        }
        if(isset($news->photo)){
        foreach (json_decode($news->photo) as $value) {
           if(file_exists(public_path("images/News/").$value)){
                unlink(public_path("images/News/").$value);
            }
        }
        }
        News::destroy($id);    
        return redirect('admin/news')->with('flash_message', 'News deleted!');
    }
    public function delete_image($id, $file){

        $allPhoto = News::findOrFail($id);
        $photo = [];

        foreach (json_decode($allPhoto->photo) as $value) {
           $photo[] = $value; 
        }
        
        unset($photo[array_search($file,$photo)]);

         if(file_exists(public_path("images/News/").$file)){
                unlink(public_path("images/News/").$file);
            }

        $allPhoto->update(['photo' => json_encode($photo)]);
        return redirect('/admin/news/'.$id);
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
        $destinationPath = public_path("images/News/");

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

    public function filesUpload(Request $request){
        $this->validate($request, ['photo' => 'required']);
        $this->validate($request, [
            'photo.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $photos = $request->file('photo');
        $arr  = [];

        $indexLoop = 0;
        
        foreach ($photos as $pic) {
            $width = $request->input('width_'.$indexLoop); // real width
            $height = $request->input('height_'.$indexLoop); // real height
            $x = $request->input('file_'.$indexLoop.'_x'); // select frist point
            $x = $x == 0 ? 1 : $x; 
            $y = $request->input('file_'.$indexLoop.'_y'); // select frist point
            $y = $y == 0 ? 1 : $y;
            $index = $request->input('photo_index_'.$indexLoop); // select coefficient
            $indexHeight = $request->input('photo_indexHeight_'.$indexLoop);

            $naturalWidth = $request->input('naturalWidth_'.$indexLoop);
            $naturalHeight = $request->input('naturalHeight_'.$indexLoop);

            $imagename       = uniqid(time()) . '.' . $pic->getClientOriginalExtension();
            $destinationPath = public_path("images/News/");
            
            $img = Image::make($pic);

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

            $arr[] = $imagename;
            $indexLoop++;
        }
        return json_encode($arr);
    }
}
