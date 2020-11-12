<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\ImagePolls;
class ImagePollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

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

        $mainpic           = $request->file('mainpic');
        $imagename       = uniqid(time()) . '.' . $mainpic->getClientOriginalExtension();
        $destinationPath = public_path("images/Polls/");

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

    public function index()
    {
         $images = ImagePolls::all();
        return view('admin.polls_image.create', compact('images'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function store(Request $request)
    {

        $this->validate($request, [
            'type' => 'required',
            'mainpic' => 'required'
          
        ]);
        $requestData = $request->all();
        $ImagePolls = ImagePolls::where('type',$requestData['type'])->first();
        $massage = "";
        if($ImagePolls) {
            if(unlink(public_path("images/Polls/").$ImagePolls->image)){
                $massage = "Image changed";
            } else {
                 $massage = "Image not changed";
            }
            $ImagePolls->image = $this->fileUpload($request);
            $ImagePolls->save();
            return redirect()->back()->with('flash_message', $massage);
        }
        $requestData['image'] = $this->fileUpload($request);
        ImagePolls::create($requestData);
        return redirect()->back()->with('flash_message', "Image created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
