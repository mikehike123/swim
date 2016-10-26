<?php

namespace App\Http\Controllers\Instructors;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skill;
use App\Card;
use Amranidev\Ajaxis\Ajaxis;
use URL;
class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::CardId(2)->get();
        return view('skill.index',compact('skills'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('skill/'. $id . '/show');
        }
        $card = Card::findOrFail($id);
        //$skills = Skill::CardId($id)->get();
        return view('skill.index',compact('card'));
    }
    public function create($id,Request $request)
    {
        
        return view('skill.create',['id' => $id]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store($id,Request $request)
    {
        $skill = new Skill();

        
        $skill->skill = $request->Skill;
        $skill->card_id=$id;
        
        $skill->save();
/*
        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new card has been created !!']);
*/
        return redirect('skill/'.$id.'/show');
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

        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/skill/'. $id . '/delete');

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
        $skill = Skill::findOrfail($id);
        $card_id = $skill->card_id;
        $skill->delete();
        return URL::to('skill/'. $card_id.'/show');
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
            return URL::to('skill/'. $id . '/edit');
        }

        
        $skill = Skill::findOrfail($id);
        return view('skill.edit',compact('skill'));
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
        if($request->ajax())
        {
            return URL::to('skill/'. $skill->card_id.'/show');
        }

        $skill = Skill::findOrfail($id);
        
        $skill->Skill = $request->Skill;
        
        $skill->save();

        
        return redirect('skill/'. $skill->card_id.'/show');
        
    }
}