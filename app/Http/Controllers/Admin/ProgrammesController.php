<?php

namespace App\Http\Controllers\Admin;
// include composer autoload
//require 'vendor/autoload.php';

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Programme;
use Illuminate\Http\Request;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class ProgrammesController extends Controller
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
            $active_programme=Programme::where('status',1);
            $programmes =$active_programme->where('name_en', 'LIKE', "%$keyword%")
                ->orwhere('name_ru', 'LIKE', "%$keyword%")
                ->orwhere('name_am', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $programmes = Programme::where('status',1)->orderBy('sort','ASC')->get();
        }

        return view('admin.programmes.index', compact('programmes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.programmes.create');
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
			'name_en' => 'required',
            'name_ru' => 'required',
            'name_am' => 'required',
			'mainpic' => 'required'
		]);

        $requestData = $request->all();
        if(isset($requestData['is_picture'])){

            $requestData['is_picture']=1;
        }
        $requestData['photo'] = $this->fileUpload($request);
/*        dd($requestData);*/
        Programme::create($requestData);

        return redirect('admin/programmes')->with('flash_message', 'Programme added!');
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
        $programme = Programme::findOrFail($id);

        return view('admin.programmes.show', compact('programme'));
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
        $programme = Programme::findOrFail($id);
        return view('admin.programmes.edit', compact('programme'));
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
            'name_en' => 'required',
            'name_am' => 'required',
			'name_ru' => 'required'
		]);
        $requestData = $request->all();
        
        $programme = Programme::findOrFail($id);
        if(isset($requestData['mainpic'])) {
            if(file_exists(public_path("images/Programmes/").$programme['photo'])){
                if(unlink(public_path("images/Programmes/").$programme['photo'])){
                    $requestData['photo'] = $this->fileUpload($request);
                }
            }
        }
         if(isset($requestData['is_picture'])){

            $requestData['is_picture']=1;
        }else{
            $requestData['is_picture']=0;
        }
        $programme->update($requestData);
        return redirect('admin/programmes')->with('flash_message', 'Programme updated!');
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
        $programme = Programme::find($id);
        $programme->status=0;
        $programme->save();
     /*   if(Programme::destroy($id)){
           if(file_exists(public_path("images/Programmes/").$programme['photo'])){
                unlink(public_path("images/Programmes/").$programme['photo']);
            } 
        }*/
        return redirect('admin/programmes')->with('flash_message', 'Programme deleted!');
    }
    public function sortprogram(Request $request){
        $index=$request->index;
        $id=$request->id;
        $programmes= Programme::orderBy('sort','ASC')->get();
        foreach ($programmes as  $programme) {
         return Programme::where('id',$id)->update(array('sort'=>$index));
        }
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
        $destinationPath = public_path("images/Programmes/");
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
