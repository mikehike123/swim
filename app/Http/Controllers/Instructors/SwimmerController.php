<?php

namespace App\Http\Controllers\Instructors;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instructors\Swimmer;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class SwimmerController.
 *
 * @author  The scaffold-interface created at 2016-09-29 08:48:15pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class SwimmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $swimmers = Swimmer::all();
        return view('swimmer.index',compact('swimmers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('swimmer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $swimmer = new Swimmer();

        
        $swimmer->FirstName = $request->FirstName;

        
        $swimmer->LastName = $request->LastName;

        
        
        $swimmer->save();
/*
        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new swimmer has been created !!']);
*/
        return redirect('swimmer');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('swimmer/'.$id);
        }

        $swimmer = Swimmer::findOrfail($id);
        return view('swimmer.show',compact('swimmer'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('swimmer/'. $id . '/edit');
        }

        
        $swimmer = Swimmer::findOrfail($id);
        return view('swimmer.edit',compact('swimmer'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $swimmer = Swimmer::findOrfail($id);
    	
        $swimmer->FirstName = $request->FirstName;
        
        $swimmer->LastName = $request->LastName;
        
        
        $swimmer->save();

        return redirect('swimmer');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/blog/public/swimmer/'. $id . '/delete/');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$swimmer = Swimmer::findOrfail($id);
     	$swimmer->delete();
        return URL::to('swimmer');
    }
}
