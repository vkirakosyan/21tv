<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\{Question, Choice, TextAnswer};
use Illuminate\Http\Request;
use App\YesOrNoAnswer;

class QuestionsController extends Controller
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
            $questions = Question::where('type', 'LIKE', "%$keyword%")
                ->orWhere('question_en', 'LIKE', "%$keyword%")
                ->orWhere('question_ru', 'LIKE', "%$keyword%")
                ->orWhere('question_am', 'LIKE', "%$keyword%")
                ->latest()
                ->paginate($perPage);
        } else {
            $questions = Question::latest()->paginate($perPage);
        }

        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.questions.create');
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
        $request->type == 'multiplechoice' ? 
            $this->validate($request, [
                'type' => 'required',
                'question_en' => 'required',
                'question_ru' => 'required',
                'question_am' => 'required',
                'choice_en' => 'required|array|between:2,6',
                'choice_ru' => 'required|array|between:2,6',
                'choice_am' => 'required|array|between:2,6'
            ]) 
            : 
            $this->validate($request, [
                'type' => 'required',
                'question_en' => 'required',
                'question_ru' => 'required',
                'question_am' => 'required'
            ]);
        $requestData = $request->all();

        $question = new Question;
        $question->type = $requestData['type'];
        $question->question_en = $requestData['question_en'];
        $question->question_ru = $requestData['question_ru'];
        $question->question_am = $requestData['question_am'];
        $question->save();
        $question_id = $question->id;
        if( array_key_exists('choice_en', $requestData) &&
                array_key_exists('choice_ru', $requestData) &&
                array_key_exists('choice_am', $requestData) )
            {
            for($i = 0; $i < count($requestData['choice_en']); $i++) {
                $choice = new Choice;
                $choice->questions_id = $question_id;
                $choice->choice_en = $requestData['choice_en'][$i];
                $choice->choice_ru = $requestData['choice_ru'][$i];
                $choice->choice_am = $requestData['choice_am'][$i];
                $choice->save();
            }
        }

        return redirect('admin/questions')->with('flash_message', 'Question added!');
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
        $question = Question::findOrFail($id);

        return view('admin.questions.show', compact('question'));
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
        $question = Question::findOrFail($id);
       // dd($question->choices);
        $choices=Choice::where('questions_id',$id);
        return view('admin.questions.edit', compact(['question','choices']));
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
        $request->type == 'multiplechoice' ? 
            $this->validate($request, [
                'type' => 'required',
                'question_en' => 'required',
                'question_ru' => 'required',
                'question_am' => 'required',
                'choice_en' => 'required|array|between:2,9',
                'choice_ru' => 'required|array|between:2,9',
                'choice_am' => 'required|array|between:2,9'
            ]) 
            : 
            $this->validate($request, [
                'type' => 'required',
                'question_en' => 'required',
                'question_ru' => 'required',
                'question_am' => 'required',
            ]);
        
        $requestData = $request->all();
        
        $question = Question::findOrFail($id);
        //dd($question);
        $question->update($requestData);

        $question_id = $question->id;
        if( array_key_exists('choice_en', $requestData) &&
            array_key_exists('choice_ru', $requestData) &&
            array_key_exists('choice_am', $requestData) )
        {
            // dd($requestData);

            for($i = 0; $i < count($requestData['choice_en']); $i++) {
                $id = isset($requestData['choice_id'])?(isset($requestData['choice_id'][$i])? $requestData['choice_id'][$i] : 0): 0;
                $choice = Choice::findOrNew($id);
                $choice->questions_id = $question_id;
                $choice->choice_en = $requestData['choice_en'][$i];
                $choice->choice_ru = $requestData['choice_ru'][$i];
                $choice->choice_am = $requestData['choice_am'][$i];
                $choice->save();
            }

     
        }

        return redirect('admin/questions')->with('flash_message', 'Question updated!');
    }
    function activate (Request $request, $id, $text = 0) {
        if(!$text){
            $allQuestion = Question::Where('type', '=', 'yesno')
            ->orWhere('type', '=', 'multiplechoice');
            $allQuestion->update(['active' => '0']);
        } else {
            $allQuestion = Question::Where('type', '=', 'text');
            $allQuestion->update(['active' => '0']);
        }
        $requestData = $request->all();
        $question = Question::find($id);
        $question->update($requestData);
        return redirect('admin/questions');
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
        $question = Question::findOrFail($id);
        Question::destroy($id);
        Choice::where('questions_id', '=', $id)->delete();
        if($question) {
            YesOrNoAnswer::Where('question', '=', $question->question_en)
                        ->orWhere('question', '=', $question->question_ru)
                        ->orWhere('question', '=', $question->question_am)
                        ->delete();
        }
        return redirect('admin/questions')->with('flash_message', 'Question deleted!');
    }
}
