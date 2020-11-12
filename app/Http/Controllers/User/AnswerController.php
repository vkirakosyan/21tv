<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TextAnswer;
use App\YesOrNoAnswer;
use App\PollsAnswer;
use App\ImagePolls;

class AnswerController extends Controller
{
	private function getIp ($type) {
		$ip;
    	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}
		$session = session('ip');
		$types = session('type'.$type);
		return ['session' => $session, 'ip' => $ip, 'type'.$type => $types ];
	}
    public function TextAnswer (Request $request) {
    	$answer = $request->all();
    	$ImagePolls = ImagePolls::where('type','text')->first();
    	$textAnswer = TextAnswer::Where('useruuid', '=', $answer['useruuid'])
    					->where('question',$answer['question'])
    					->first();
		if($textAnswer){
			return ["yes_or_no",asset('images/Polls/'.$ImagePolls->image)];
		} else {
	    	if(TextAnswer::create($answer)) { 
	    		return ["yes",asset('images/Polls/'.$ImagePolls->image)];
	    	}
		}
    	return ["no",asset('images/Polls/'.$ImagePolls->image)];;
    }
    public function yesOrNo (Request $request) {
    	$answer = $request->all();
		$ImagePolls = ImagePolls::where('type','yes_no')->first();
		$YesNo = YesOrNoAnswer::Where('useruuid', '=', $answer['useruuid'])
							->where('question',$answer['question'] )
							->first();
    	if($YesNo){
    		//stex
			return ["yes_or_no",asset('images/Polls/'.$ImagePolls->image)];
		} else {
	    	if(YesOrNoAnswer::create($answer)) {
		    	return ["yes",asset('images/Polls/'.$ImagePolls->image)];
		    }
		}
    	return ['no',asset('images/Polls/'.$ImagePolls->image)];;
    }
    public function pollsAnswer (Request $request) {
    	$answer = $request->all();
    	$ImagePolls = ImagePolls::where('type','hayhot')->first();
    	$pollsAnswer = PollsAnswer::Where('useruuid', '=', $answer['useruuid'])
    								->where('type', $answer["type"])
    								->first();
    	if($pollsAnswer){
			return ["yes_or_no",asset('images/Polls/'.$ImagePolls->image)];
		} else {
	    	if(PollsAnswer::create($answer)) {
		    	return ["yes",asset('images/Polls/'.$ImagePolls->image)];
		    }
		}
    	return ['no',asset('images/Polls/'.$ImagePolls->image)];
    }
}