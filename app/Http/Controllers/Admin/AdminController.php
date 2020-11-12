<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth');
	}
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function logout (Request $request) {
        $request->session()->flush();
        return redirect('/');
    }
}
