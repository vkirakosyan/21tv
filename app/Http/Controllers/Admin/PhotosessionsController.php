<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Photosession;
use Illuminate\Http\Request;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class PhotosessionsController extends Controller
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
            $photosessions = Photosession::where('title_en', 'LIKE', "%$keyword%")
                ->orWhere('title_ru', 'LIKE', "%$keyword%")
                ->orWhere('title_am', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%".date('Y-m-d',strtotime($keyword))."%")
                ->latest()->paginate($perPage);
        } else {
            $photosessions = Photosession::latest()->paginate($perPage);
        }

        return view('admin.photosessions.index', compact('photosessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.photosessions.create');
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
			'title_en' => 'required',
			'title_ru' => 'required',
			'title_am' => 'required',
			'photo.*' => 'required|image|mimes:jpeg,png,jpg',
			'date' => 'required',
            'mainpic' => 'required|image|mimes:jpeg,png,jpg,gif'
		]);
        $requestData = $request->all();
        $requestData['mainpic'] = $this->fileUpload($request);   
        $requestData['photos'] = $this->filesUpload($request);
        Photosession::create($requestData);

        return redirect('admin/photosessions')->with('flash_message', 'Photosession added!');
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
        $photosession = Photosession::findOrFail($id);

        return view('admin.photosessions.show', compact('photosession'));
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
        $photosession = Photosession::findOrFail($id);

        return view('admin.photosessions.edit', compact('photosession'));
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
			'title_en' => 'required',
			'title_ru' => 'required',
			'title_am' => 'required',
			'date' => 'required'
		]);
        $requestData = $request->all();
        // dd($requestData);
        $photosession = Photosession::findOrFail($id);
        if(isset($requestData['mainpic'])){
            if(file_exists(public_path("images/Photosessions/").$photosession['mainpic'])){
                unlink(public_path("images/Photosessions/").$photosession['mainpic']);
            }
            $requestData['mainpic'] = $this->fileUpload($request);
        }
        if(array_key_exists('photo', $requestData))
        {
            $photo = [];
            foreach (json_decode($this->filesUpload($request)) as $value) {
               $photo[] = $value; 
            } 
            foreach (json_decode($photosession['photos']) as $value) {
                $photo[] = $value;
            }
            $requestData['photos'] = json_encode($photo);
        }
        $photosession->update($requestData);

        return redirect('admin/photosessions')->with('flash_message', 'Photosession updated!');
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
         $photosession = Photosession::findOrFail($id);
        if(file_exists(public_path("images/Photosessions/").$photosession['mainpic'])){
            unlink(public_path("images/Photosessions/").$photosession['mainpic']);
        }
        foreach (json_decode($photosession->photos) as $value) {
           if(file_exists(public_path("images/Photosessions/").$value)){
                unlink(public_path("images/Photosessions/").$value);
            }
        }
        Photosession::destroy($id);

        return redirect('admin/photosessions')->with('flash_message', 'Photosession deleted!');
    }
    public function delete_image($id, $file){

        $allPhoto = Photosession::findOrFail($id);
        $photo = [];

        foreach (json_decode($allPhoto->photos) as $value) { 
           $photo[] = $value; 
        }
        
        unset($photo[array_search($file,$photo)]);

         if(file_exists(public_path("images/Photosessions/").$file)){
                unlink(public_path("images/Photosessions/").$file);
            }

        $allPhoto->update(['photos' => json_encode($photo)]);
        return redirect('/admin/photosessions/'.$id);
    }
    public function fileUpload(Request $request)
    {
        $this->validate($request, [
            'mainpic' => 'required|image|mimes:jpeg,png,jpg,gif'
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
        $destinationPath = public_path("images/Photosessions/");
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
            'photo.*' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        $photo = $request->file('photo');
        $arr  = [];

        $indexLoop = 0;
        foreach ($photo as $pic) {
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
            $destinationPath = public_path("images/Photosessions/");
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
