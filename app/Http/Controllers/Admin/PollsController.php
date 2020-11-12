<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Poll;
use App\PollsAnswer;
use App\PollsSave;
use App\PollsSaveCotegory;
use App\PollsSaveAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PollsController extends Controller
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
            $polls = Poll::where('type', 'LIKE', "%$keyword%")
                ->orWhere('options_en', 'LIKE', "%$keyword%")
                ->orWhere('options_ru', 'LIKE', "%$keyword%")
                ->orWhere('options_am', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $polls = Poll::latest()->paginate($perPage);
        }

        return view('admin.polls.index', compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.polls.create');
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
			'type' => 'required',
            'options_en' => 'required',
            'options_ru' => 'required',
			'options_am' => 'required'
		]);
        $requestData = $request->all();
        for($i = 0; $i < count($requestData['options_en']); $i++) {
            $poll = new Poll();
            $poll->type = $requestData['type'];
            $poll->options_en = $requestData['options_en'][$i];
            $poll->options_ru = $requestData['options_ru'][$i];
            $poll->options_am = $requestData['options_am'][$i];
            $poll->status=1;
            $poll->save();
        }

        return redirect('admin/polls')->with('flash_message', 'Poll added!');
    }

    public function polls_add (Request $request) {
        $this->validate($request, [
            'type' => 'required',
            'options_en' => 'required',
            'options_ru' => 'required',
            'options_am' => 'required'
        ]);
        $requestData = $request->all();
        $poll = new Poll();
        $poll->type = $requestData['type'];
        $poll->options_en = $requestData['options_en'];
        $poll->options_ru = $requestData['options_ru'];
        $poll->options_am = $requestData['options_am'];
        $poll->status=1;
        $poll->save();
        return redirect('admin/polls')->with('flash_message', 'Poll added!');;
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
        $poll = Poll::findOrFail($id);

        return view('admin.polls.show', compact('poll'));
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
        $poll = Poll::findOrFail($id);

        return view('admin.polls.edit', compact('poll'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save_polls(){
        $polls = Poll::All();
        $pols_save = [];
        if($polls) {
            $date = PollsSaveCotegory::Create(['date' => Carbon::today()]);
            foreach ($polls as $value) {
                $value['polls_save_cotegory_id'] = $date->id;
                $value['polls_save_answer'] = $value->answer;
                $pols_save[] = $value;
                unset($value->id);
                unset($value->answer);
            }
            foreach ($pols_save as  $pols) {
                $pols_id = PollsSave::create($pols->toArray());
                foreach ($pols->polls_save_answer as  $pols_answer) {
                    $pols_answer['polls_id'] = $pols_id->id;
                    PollsSaveAnswer::create($pols_answer->toArray());
                }
            }
            

        }
       return redirect ('/admin/polls_save')->with('flash_message', 'Polls  adding to archive!');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'type' => 'required',
            'options_en' => 'required',
            'options_ru' => 'required',
			'options_am' => 'required'
		]);
        $requestData = $request->all();
        $poll = Poll::findOrFail($id);
        $poll->update($requestData);

        return redirect('admin/polls')->with('flash_message', 'Poll updated!');
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
        $poll = Poll::findOrFail($id);
        Poll::destroy($id);
        if($poll) {
            PollsAnswer::Where('polls_id', '=', $id)->where('condidate', '=', 0)->delete();
        }

        return redirect('admin/polls')->with('flash_message', 'Poll deleted!');
    }

    public function create_items (){
        
        return view('admin.polls.create_items');
    }
    public function status ($status){
        Poll::query()->update(['status' => $status]);
        return redirect()->back();
    }
}
