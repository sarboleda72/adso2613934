<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', function () {
    return view('partials.menu');
});

Route::get('/menulogin', function () {
    return view('partials.menulogin');
});

Route::get('/catalogue', function () {
    return view('catalogue');
});

Route::get('/listgames', function () {
    $games = App\Models\Game::all();
    return view('listgames', ['games' => $games]);
});

Route::get('/profile', function () {
    $user = User::where('id', auth()->id())->first(); 
    return view('profile', ['user' => $user]);
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
/*     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); */
    Route::resources([
        'users' => UserController::class,
        'categories'=>CategoryController::class,
        'games'=>GameController::class
    ]);
});

Route::get('/games/list', function(){
    $games = App\Models\Game::all();
    //var_dump($games);
    dd($games->toArray());
});

Route::get('/game/show/{id}', function($id){
    $game = App\Models\Game::find($id);
    dd($game->toArray());
});

Route::get('/game/show/{id}', function(){
    $game = App\Models\Game::find(request()->id);
    dd($game->toArray());
});

Route::get('/viewusers', function(){
    $viewusers = App\Models\User::limit(20)->get();
    $code = "<table style='border-collapse: collapse;margin-inline: auto;font-family: Arial'>
                <tr>
                    <th style='background: gray; color: white; padding: 0.4rem'>Id</th>
                    <th style='background: gray; color: white; padding: 0.4rem'>Fullname</th>
                    <th style='background: gray; color: white; padding: 0.4rem'>Age</th>
                    <th style='background: gray; color: white; padding: 0.4rem'>Created At</th>
                </tr>";
    foreach ($viewusers as $user){
        $code .= "<tr>";
        $code .= "<td style='border: 1px solid gray; padding: 0.4rem'>".$user->id."</td>";
        $code .= "<td style='border: 1px solid gray; padding: 0.4rem'>".$user->fullname."</td>";
        $code .= "<td style='border: 1px solid gray; padding: 0.4rem'>".Carbon\Carbon::parse($user->birthdate)->age."</td>";
        $code .= "<td style='border: 1px solid gray; padding: 0.4rem'>".$user->created_at->diffForHumans()."</td>";
    }
    return $code . "</table>";
});


// route search

Route::post('users/search', [UserController::class,'search']);
Route::post('categories/search',[CategoryController::class,'search']);
Route::post('games/search',[GameController::class,'search']);

//exports
Route::get('exports/users/pdf', [UserController::class,'pdf']);
Route::get('exports/users/excel', [UserController::class,'excel']);

Route::get('exports/games/pdf', [GameController::class, 'pdf']);
Route::get('exports/games/excel', [GameController::class, 'excel']);



require __DIR__.'/auth.php';
