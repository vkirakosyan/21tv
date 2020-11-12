<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PollsSave;
use App\PollsSaveCotegory;
class PollsSaveController extends Controller
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
            $polls = PollsSaveCotegory::where('date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $polls = PollsSaveCotegory::latest()->paginate($perPage);
        }

        return view('admin.poll_saves.index', compact('polls'));
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
        $polls = PollsSaveCotegory::find($id);
        $polls->polls_save;
        return view('admin.poll_saves.show', compact('polls'));
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
        if(PollsSaveCotegory::Destroy($id)){
            if(PollsSave::Where('polls_save_cotegory_id','=', $id)->forceDelete()){
                return redirect('/admin/polls_save')->with('flash_message', 'Poll deleted');
            } else {
               return redirect('/admin/polls_save')->with('flash_message', 'Poll no deleted'); 
            }
        } else {
            return redirect('/admin/polls_save')->with('flash_message', 'Poll cotegory no deleted'); 
        }
    }
}
