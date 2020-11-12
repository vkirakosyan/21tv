<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Archive;
use App\Programme;
use App\Episode;
use DB;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class ArchiveController extends Controller
{
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
            $episodes = Archive::leftJoin('programmes', 'programme_id', '=', 'programmes.id')
                ->where('programmes.name_en', 'LIKE', "%$keyword%")
                ->orwhere('programmes.name_ru', 'LIKE', "%$keyword%")
                ->orwhere('programmes.name_am', 'LIKE', "%$keyword%")
                ->orWhere('name_en', 'LIKE', "%$keyword%")
                ->orWhere('name_ru', 'LIKE', "%$keyword%")
                ->orWhere('name_am', 'LIKE', "%$keyword%")
                ->orWhere('video_url', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%".date('Y-m-d',strtotime($keyword))."%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orderBy('episodes.created_at')->paginate($perPage);
                
                
        } else {
        /*    $episodes=DB::table('archives')->select('archives.*','programmes.name_en as prog_name')->leftJoin('programmes','programmes.id','=','archives.programme_id')->latest()->paginate($perPage);*/
           $episodes = Archive::latest()->paginate($perPage);
        }
        //dd($episodes);
        return view('admin.archive.index', compact('episodes'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  /*      $episode = Archive::findOrFail($id);
        return view('admin.archive.show', compact('episode'));*/
           $episode=DB::table('archives')->select('archives.*','programmes.name_en as prog_name')->leftJoin('programmes','programmes.id','=','archives.programme_id')->where('archives.id',$id)->first();      
        return view('admin.archive.show', compact('episode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $episode = Archive::findOrFail($id);
        $programmes = Programme::get(['id','name_en']);
        $selects = [];
        foreach($programmes as $programme)
        {
            $selects[$programme->id] = $programme->name_en;
        }
        return view('admin.archive.edit', compact('episode','selects'));
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
            'programme_id' => 'required',
            'name_en' => 'required',
            'name_ru' => 'required',
            'name_am' => 'required',
            'video_url' => 'required',
            'date' => 'required',
            'status' => 'required'
        ]);
        $episode = Archive::findOrFail($id);
        $requestData = $request->all();
        if(isset($requestData['photo'])) {
            $requestData['photo'] = $this->fileUpload($request);
            if(file_exists(public_path("images/Episodes/").$episode['photo'])){
                unlink(public_path("images/Episodes/").$episode['photo']);
            } 
        }
        
        
        $episode->update($requestData);

        return redirect('admin/archive')->with('flash_message', 'Episode updated!');
    }
    public function send_archive ($id){
        $episode = Archive::findOrFail($id);
        Episode::create($episode->toArray()); 
        Archive::destroy($id);
        return redirect('admin/archive')->with('flash_message','episode has been sent Episode');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode = Archive::findOrFail($id);
        Archive::destroy($id);
        if($episode['photo'] != null){
                unlink(public_path("images/Episodes/").$episode['photo']);
            }
        return redirect('admin/archive')->with('flash_message','Episode deleted!');
    }
    public function fileUpload(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $photo           = $request->file('photo');
        $imagename       = uniqid(time()) . '.' . $photo->getClientOriginalExtension();
        $destinationPath = public_path("images/Episodes/");
        
        $photo->move($destinationPath, $imagename);

        return $imagename;
    }
}
