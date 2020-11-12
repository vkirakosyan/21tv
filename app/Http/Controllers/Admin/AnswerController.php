<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PollsAnswer;
use App\TextAnswer;
use App\YesOrNoAnswer;
use App\Question;
use App\Poll;
use App\Choice;
use App\PollsCandidate;


class AnswerController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}
	
	private function getYesNoAnswer () {
		$answers = [];
		$question = Question::Where('active', '=', 1)
				->where(function ($query) {
                $query->where('type','=', "yesno")
                ->orWhere('type','=', "multiplechoice");})
				->first();
		if($question) {
			$answers = YesOrNoAnswer::Where('question', '=', $question->id)
								->get();
			}
			foreach ($answers as $key => $answer) {
				$button = Choice::where('id', $answer->answer )->first();
				if($button){
					$answers[$key]->answer = $button->choice_en;
				}
				
			}
		return ['answer' => $question , 'answers' => $answers];
	}
	private function getPollsFirstAnswer () {
		$hay10 = Poll::Where('type', '=', 'hay10')->get();
		foreach ($hay10 as $value) {
			$value->answer;
		}
		$hay10Candidate = PollsCandidate::Where('type', '=', 'hay10')->get();
		foreach ($hay10Candidate as $value) {
			$value->answer;
		}
		 return ['hay10' => $hay10, 'candidate' => $hay10Candidate];
	}
	private function getPollsLastAnswer () {
		$hot10 = Poll::Where('type', '=', 'hot10')->get();
		foreach ($hot10 as $value) {
			$value->answer;
		}
		$hot10Candidate = PollsCandidate::Where('type', '=', 'hot10')->get();
		foreach ($hot10Candidate as $value) {
			$value->answer;
		}
		 return ['hot10' => $hot10, 'candidate' => $hot10Candidate];

	}
	private function getTextAnswer () {
		$answers= [];
		$Question = Question::Where('active', '=', 1)
				->Where('type','=', "text")
				->first();
		if($Question) {
			$answers = TextAnswer::Where('question', '=', $Question->id)
									->orderBy('id','DESC')
									->get();
		} 
		return ['ansvers' => $answers, 'question' => $Question];
	}
    public function index () {
    	$data = [];
    	$data['yesno'] = $this->getYesNoAnswer();
    	$data['hay10'] = $this->getPollsFirstAnswer();
    	$data['hot10'] = $this->getPollsLastAnswer();
    	$data['text'] = $this->getTextAnswer();
    	return view('admin.answer.index',compact('data'));
    } 
}
