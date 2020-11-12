<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facebook;

class FacebookActivateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getStatus ($page){
    	$page = Facebook::Where('page_name', '=', $page)->first();
    	return $page;
    }
    public function setStatus ($page, $status){
    	$page = Facebook::Where('page_name', '=', $page)->first();
    	if($page){
    		$page->active = $status;
		} else {
			Facebook::Create(['page_name' => $page, 'active' => $status]);
		}
    	return redirect('admin.'.$page);
    }
}
