<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VacantJob;

class VacantJobController extends Controller
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
            $vacant_job = VacantJob::where('header_en', 'LIKE', "%$keyword%")
                ->orWhere('header_ru', 'LIKE', "%$keyword%")
                ->orWhere('header_am', 'LIKE', "%$keyword%")
                ->orWhere('small_text_en', 'LIKE', "%$keyword%")
                ->orWhere('small_text_ru', 'LIKE', "%$keyword%")
                ->orWhere('small_text_am', 'LIKE', "%$keyword%")
                ->orWhere('text_en', 'LIKE', "%$keyword%")
                ->orWhere('text_ru', 'LIKE', "%$keyword%")
                ->orWhere('text_am', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vacant_job = VacantJob::latest()->paginate($perPage);
        }
        return view('admin.vacant_job.index', compact('vacant_job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vacant_job.create');
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
            'header_en' => 'required',
            'header_ru' => 'required',
            'header_am' => 'required',
            'small_text_en' => 'required',
            'small_text_ru' => 'required',
            'small_text_am' => 'required',
            'text_en' => 'required',
            'text_ru' => 'required',
            'text_am' => 'required'
        ]);
        $requestData = $request->all();
       VacantJob::create($requestData);

        return redirect('admin/vacant_jobs')->with('flash_message', 'Vacant Job added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacant_job = VacantJob::findOrFail($id);
        return view('admin.vacant_job.show', compact('vacant_job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacant_job = VacantJob::findOrFail($id);
        return view('admin.vacant_job.edit', compact('vacant_job'));
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
            'header_en' => 'required',
            'header_ru' => 'required',
            'header_am' => 'required',
            'small_text_en' => 'required',
            'small_text_ru' => 'required',
            'small_text_am' => 'required',
            'text_en' => 'required',
            'text_ru' => 'required',
            'text_am' => 'required'
        ]);
        $requestData = $request->all();
        
        $about = VacantJob::findOrFail($id);
        $about->update($requestData);

        return redirect('admin/vacant_jobs')->with('flash_message', 'Vacant Job updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VacantJob::destroy($id);
        return redirect('admin/vacant_jobs')->with('flash_message', 'Vacant Job deleted!');
    }
}
