<?php

namespace App\Http\Controllers\AdminSwim;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminSwim\Card;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class CardController.
 *
 * @author  Mike Clark
 * @link  
 */
class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();
        return view('card.index',compact('cards'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('card.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card = new Card();

        
        $card->card_name = $request->CardName;
        
        $card->save();
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
        return redirect('card');
    }

}