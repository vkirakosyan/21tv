<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Top_Image;
use Illuminate\Http\Request;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class Top_ImagesController extends Controller
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
            $top_images = Top_Image::where('first_img', 'LIKE', "%$keyword%")
                ->orWhere('second_img', 'LIKE', "%$keyword%")
                ->orWhere('third_img', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $top_images = Top_Image::latest()->paginate($perPage);
        }

        return view('admin.top_-images.index', compact('top_images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.top_-images.create');
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
        $top_image=new Top_Image;
       $top_image=$top_image->first();
        if ($request->image_type=='first_img') {
            if($top_image['first_img'] != null){
                unlink(public_path("images/Top_Images/").$top_image['first_img']);
            }

            $requestData['first_img'] = $this->fileUpload($request);
            if(isset($top_image['second_img'])){
                $requestData['second_img']=$top_image['second_img'];
            }
            if(isset($top_image['third_img'])){
                $requestData['third_img']=$top_image['third_img'];
            }

        }
           if ($request->image_type=='second_img') {
            if($top_image['second_img']!= null ){
                unlink(public_path("images/Top_Images/").$top_image['second_img']);
                
            }
            $requestData['second_img'] = $this->fileUpload($request);
            if(isset($top_image['first_img'])){
                $requestData['first_img']=$top_image['first_img'];
            }
            if(isset($top_image['third_img'])){
                $requestData['third_img']=$top_image['third_img'];
            }
        }
           if ($request->image_type=='third_img') {
            if($top_image['third_img'] != null){
                unlink(public_path("images/Top_Images/").$top_image['third_img']);
            
            }
            $requestData['third_img'] = $this->fileUpload($request);
            if(isset($top_image['second_img'])){
                $requestData['second_img']=$top_image['second_img'];
            }
            if(isset($top_image['first_img'])){
                $requestData['first_img']=$top_image['first_img'];
            }
            }
            if($top_image == null){
             Top_Image::create($requestData);
            }
            else{
            $top_image->update($requestData);
            }
            return redirect('admin/top_-images')->with('flash_message', 'Top_Image added!');
        
        
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
        $top_image = Top_Image::findOrFail($id);

        return view('admin.top_-images.show', compact('top_image'));
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
        $top_image = Top_Image::findOrFail($id);

        return view('admin.top_-images.edit', compact('top_image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
/*    public function update(Request $request, $id)
    {
        $top_image = Top_Image::findOrFail($id);
        
        $requestData = $request->all();

        if(isset($requestData['first_img'])) {
            if(file_exists(public_path("images/Top_Images/").$top_image['first_img'])){
                if(unlink(public_path("images/Top_Images/").$top_image['first_img'])){
                }
            }
            $requestData['first_img'] = $this->fileUpload($request, true, 'first_img');
        }
        if(isset($requestData['second_img'])) {
            if(file_exists(public_path("images/Top_Images/").$top_image['second_img'])){
                if(unlink(public_path("images/Top_Images/").$top_image['second_img'])){
                    
                }
            }
            $requestData['second_img'] = $this->fileUpload($request, true, 'second_img');
        }
        if(isset($requestData['third_img'])) {
            if(file_exists(public_path("images/Top_Images/").$top_image['third_img'])){
                if(unlink(public_path("images/Top_Images/").$top_image['third_img'])){
                    
                }
            }
            $requestData['third_img'] = $this->fileUpload($request, true, 'third_img');
        }
        $top_image->update($requestData);
        return redirect('admin/top_-images')->with('flash_message', 'Top_Image updated!');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $top_image = Top_Image::find($id);
        if($top_image['third_img'] != null){
            unlink(public_path("images/Top_Images/").$top_image['third_img']);
        }
         if($top_image['first_img'] != null){
            unlink(public_path("images/Top_Images/").$top_image['first_img']);
        }
         if($top_image['second_img'] != null){
            unlink(public_path("images/Top_Images/").$top_image['second_img']);
        }

        Top_Image::destroy($id);

        return redirect('admin/top_-images')->with('flash_message', 'Top_Image deleted!');
    }

/*    public function fileUpload(Request $request, $editMode=false, $file_input='')
    {
        $editMode ? $this->validate($request, [
                        'first_img'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                        'second_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                        'third_img'  => 'image|mimes:jpeg,png,jpg,gif|max:2048'
                    ])
                    : // if create mode
                    $this->validate($request, [
                        'first_img'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                        'second_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                        'third_img'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
                    ]);
                   
        if(!$editMode){

            $firstpic         = $request->file('first_img');
            $secondpic        = $request->file('second_img');
            $thirdpic         = $request->file('third_img');

            $pics = ['first_img' => $firstpic, 'second_img' => $secondpic, 'third_img' => $thirdpic];
        } else {

            $file             = $request->file($file_input);
            $imagename        = uniqid(time()) . '.' . $file->getClientOriginalExtension();
            $destinationPath  = public_path("images/Top_Images/");
            $file->move($destinationPath, $imagename);
            return $imagename;exit;
        }
        $imagenames = [];

        foreach($pics as $key => $pic)
        {
            $imagename        = uniqid(time()) . '.' . $pic->getClientOriginalExtension();
            $destinationPath  = public_path("images/Top_Images/");
            
            $pic->move($destinationPath, $imagename);
            $imagenames[$key] = $imagename;
        }

        return $imagenames;
    }*/
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
        $destinationPath = public_path("images/Top_Images/");
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
}
