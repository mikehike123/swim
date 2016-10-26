<?php

namespace App\Http\Controllers\Crud;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Swimmer;
use Illuminate\Http\Request;
use Session;

class SwimmersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $swimmers = Swimmer::paginate(25);

        return view('crud.swimmers.index', compact('swimmers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('crud.swimmers.create');
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
			'First_Name' => 'required',
			'Last_Name' => 'required'
		]);
        $requestData = $request->all();
        
        Swimmer::create($requestData);

        Session::flash('flash_message', 'Swimmer added!');

        return redirect('crud/swimmers');
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
        $swimmer = Swimmer::findOrFail($id);

        return view('crud.swimmers.show', compact('swimmer'));
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
        $swimmer = Swimmer::findOrFail($id);

        return view('crud.swimmers.edit', compact('swimmer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'First_Name' => 'required',
			'Last_Name' => 'required'
		]);
        $requestData = $request->all();
        
        $swimmer = Swimmer::findOrFail($id);
        $swimmer->update($requestData);

        Session::flash('flash_message', 'Swimmer updated!');

        return redirect('crud/swimmers');
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
        Swimmer::destroy($id);

        Session::flash('flash_message', 'Swimmer deleted!');

        return redirect('crud/swimmers');
    }
}
