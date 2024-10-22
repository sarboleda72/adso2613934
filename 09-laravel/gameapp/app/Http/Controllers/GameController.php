<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use App\Models\Category;
use PDF;
use App\Exports\GameExport;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user= User::All();
        $games = Game::paginate(20);
        return view('games.index')->with(['games' => $games]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cats = Category::All();
        return view('games.create')->with(['cats' => $cats]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameRequest $request)
    {
        //dd($request->all());

        $game = new Game();
        $game->title = $request->title;
        $game->image = 'no-game.png';
        $game->developer = $request->developer;
        $game->releasedate = $request->releasedate;
        $game->category_id = $request->categoryId;
        $game->user_id = $request->userId;
        $game->price = $request->price;
        $game->genre = $request->genre;
        $game->slider = $request->slider;
        $game->description = $request->description;

        if ($game->save()) {
            return redirect('games')->with('messages', 'The game: ' . $game->title . 'was successfully added!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //dd($user->toArray());
        return view('games.show')->with(['game' => $game]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $cats = Category::all();

        return view('games.edit')->with(['game' => $game, 'cats' => $cats]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameRequest $request, Game $game)
    {
        // Si hay una nueva imagen, procesarla y guardarla
        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/games'), $image);
        } else {
            // Si no hay nueva imagen, mantener la anterior
            $image = $game->image;
        }

        // Actualizar los campos del juego con los datos del request
        $game->title = $request->title;
        $game->category_id = $request->categoryId;
        $game->releasedate = $request->releasedate;
        $game->developer = $request->developer;
        $game->price = $request->price;
        $game->genre = $request->genre;
        $game->slider = $request->has('slider') ? 1 : 0;  // Checkbox booleano
        $game->description = $request->description;
        $game->image = $image;

        // Guardar los cambios
        if ($game->save()) {
            return redirect('games')->with('messages', 'The game: ' . $game->title . ' was successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
        if($game->delete()){
            return redirect('games')->with('messages', 'The game: '. $game->title.' was successfully delete!');
        }

    }

    public function search(Request $request){
        $games= Game::names($request->q)->paginate(20);
        return view('games.search')-> with('games', $games);

    }

    public function pdf(){
    $games = Game::all();
    $pdf = PDF::loadView('games.pdf', compact('games'));
    return $pdf->download('allgames.pdf');
}

public function excel(){
    return \Excel::download(new GameExport, 'allgames.xlsx');
    }

}
