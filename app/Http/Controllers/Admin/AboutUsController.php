<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutUs;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $about_us = AboutUs::where('header1_en', 'LIKE', "%$keyword%")
                ->orWhere('header1_ru', 'LIKE', "%$keyword%")
                ->orWhere('header1_am', 'LIKE', "%$keyword%")
                ->orWhere('text1_en', 'LIKE', "%$keyword%")
                ->orWhere('text1_ru', 'LIKE', "%$keyword%")
                ->orWhere('text1_am', 'LIKE', "%$keyword%")
                ->orWhere('header2_en', 'LIKE', "%$keyword%")
                ->orWhere('header2_ru', 'LIKE', "%$keyword%")
                ->orWhere('header2_am', 'LIKE', "%$keyword%")
                ->orWhere('text2_en', 'LIKE', "%$keyword%")
                ->orWhere('text2_ru', 'LIKE', "%$keyword%")
                ->orWhere('text2_am', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $about_us = AboutUs::latest()->paginate($perPage);
        }

        return view('admin.about_us.index', compact('about_us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about_us.create');
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
            'header1_en' => 'required',
            'header1_ru' => 'required',
            'header1_am' => 'required',
            'text1_en' => 'required',
            'text1_ru' => 'required',
            'text1_am' => 'required',
            'header2_en' => 'required',
            'header2_ru' => 'required',
            'header2_am' => 'required',
            'text2_en' => 'required',
            'text2_ru' => 'required',
            'text2_am' => 'required'
        ]);
        $requestData = $request->all();
        $requestData['mainpic'] = $this->fileUpload($request);
        AboutUs::create($requestData);

        return redirect('admin/about_us')->with('flash_message', 'About added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about_us = AboutUs::findOrFail($id);
        return view('admin.about_us.show', compact('about_us'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about_us = AboutUs::findOrFail($id);
        return view('admin.about_us.edit', compact('about_us'));
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
        $this->validate($request, [
            'header1_en' => 'required',
            'header1_ru' => 'required',
            'header1_am' => 'required',
            'text1_en' => 'required',
            'text1_ru' => 'required',
            'text1_am' => 'required',
            'header2_en' => 'required',
            'header2_ru' => 'required',
            'header2_am' => 'required',
            'text2_en' => 'required',
            'text2_ru' => 'required',
            'text2_am' => 'required'
        ]);
        $requestData = $request->all();
        
        $about_us = AboutUs::findOrFail($id);
        if(isset($requestData['mainpic'])){
            if(file_exists(public_path("images/AboutUs/").$about_us['mainpic'])){
                unlink(public_path("images/AboutUs/").$about_us['mainpic']);
            }
            $requestData['mainpic'] = $this->fileUpload($request);
        }
        $about_us->update($requestData);

        return redirect('admin/about_us')->with('flash_message', 'About updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about_us = AboutUs::findOrFail($id);
        if(file_exists(public_path("images/AboutUs/").$about_us['mainpic'])){
                unlink(public_path("images/AboutUs/").$about_us['mainpic']);
            }
        AboutUs::destroy($id);
        return redirect('admin/about_us')->with('flash_message', 'About deleted!');
    }
    public function fileUpload(Request $request)
    {
        $this->validate($request, [
            'mainpic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $mainpic         = $request->file('mainpic');
        $imagename       = uniqid(time()) . '.' . $mainpic->getClientOriginalExtension();
        $destinationPath = public_path("images/AboutUs/");
        
        $mainpic->move($destinationPath, $imagename);
        
        return $imagename;
    }
}
