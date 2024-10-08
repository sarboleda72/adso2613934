<?php

namespace App\Http\Controllers;
use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use App\Models\Categegory;

class GameController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        // $user= User::All();
        $games = Game::paginate(20);   
        return view('games.index')->with(['games'=> $games]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cats= Category::All();
        return view('games.create')->with(['cats'=> $cats]);
    }
    
}
