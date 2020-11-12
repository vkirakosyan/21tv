<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
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
            $about = About::where('address_en', 'LIKE', "%$keyword%")
                ->orWhere('address_ru', 'LIKE', "%$keyword%")
                ->orWhere('address_am', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $about = About::latest()->paginate($perPage);
        }

        return view('admin.about.index', compact('about'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.about.create');
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
            'address_en' => 'required',
            'address_ru' => 'required',
            'address_am' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
			'maps' => 'required',
			'phone' => 'required',
			'email' => 'required'
		]);
        $requestData = $request->all();
        
        About::create($requestData);

        return redirect('admin/about')->with('flash_message', 'About added!');
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
        $about = About::findOrFail($id);

        return view('admin.about.show', compact('about'));
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
        $about = About::findOrFail($id);

        return view('admin.about.edit', compact('about'));
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
        $this->validate($request, [
            'address_en' => 'required',
            'address_am' => 'required',
            'address_ru' => 'required',
			'maps' => 'required',
			'phone'   => 'required',
			'email'   => 'required'
		]);
        $requestData = $request->all();
        
        $about = About::findOrFail($id);
        $about->update($requestData);

        return redirect('admin/about')->with('flash_message', 'About updated!');
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
        About::destroy($id);

        return redirect('admin/about')->with('flash_message', 'About deleted!');
    }
}
