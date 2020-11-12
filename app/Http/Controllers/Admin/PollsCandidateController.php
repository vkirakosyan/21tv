<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PollsCandidate;
use App\PollsAnswer;

class PollsCandidateController extends Controller
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
            $polls_candidate = PollsCandidate::where('type', 'LIKE', "%$keyword%")
                ->orWhere('options_en', 'LIKE', "%$keyword%")
                ->orWhere('options_ru', 'LIKE', "%$keyword%")
                ->orWhere('options_am', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $polls_candidate = PollsCandidate::latest()->paginate($perPage);
        }

        return view('admin.polls_candidate.index', compact('polls_candidate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.polls_candidate.create');
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
            'options_en' => 'required',
            'options_ru' => 'required',
            'options_am' => 'required'
        ]);
        $requestData = $request->all();
        for($i = 0; $i < count($requestData['options_en']); $i++) {
            $poll = new PollsCandidate();
            $poll->type = $requestData['type'];
            $poll->options_en = $requestData['options_en'][$i];
            $poll->options_ru = $requestData['options_ru'][$i];
            $poll->options_am = $requestData['options_am'][$i];
            $poll->save();
        }

        return redirect('admin/polls_candidate')->with('flash_message', 'Polls Candidate added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $polls_candidate = PollsCandidate::findOrFail($id);

        return view('admin.polls_candidate.show', compact('polls_candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $polls_candidate = PollsCandidate::findOrFail($id);

        return view('admin.polls_candidate.edit', compact('polls_candidate'));
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
            'type' => 'required',
            'options_en' => 'required',
            'options_ru' => 'required',
            'options_am' => 'required'
        ]);
        $requestData = $request->all();
        $poll = PollsCandidate::findOrFail($id);
        $poll->update($requestData);

        return redirect('admin/polls_candidate')->with('flash_message', 'Polls Candidate updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pollsCandidate = PollsCandidate::findOrFail($id);
        PollsCandidate::destroy($id);
        if($pollsCandidate) {
            PollsAnswer::Where('polls_id', '=', $id)->where('condidate', '=', 1)->delete();
        }
        return redirect('admin/polls_candidate')->with('flash_message', 'Polls Candidate deleted!');
    }
}
