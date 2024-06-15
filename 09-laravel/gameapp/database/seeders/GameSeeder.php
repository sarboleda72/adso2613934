<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $game = new Game;
        $game->title = 'Mario Oddyssey';
        $game->developer = 'Nintendo';
        $game->releasedate = '2017-10-27';
        $game->category_id = 1;
        $game->user_id = 1;
        $game->price = 59;
        $game->genre = '3D Adventure';
        $game->description = 'Lorem ipsum sit amet';
        $game->save();

        $game = new Game;
        $game->title = 'The Legend of Zelda: Breath of the Wild';
        $game->developer = 'Nintendo';
        $game->releasedate = '2017-03-03';
        $game->category_id = 2;
        $game->user_id = 1;
        $game->price = 59;
        $game->genre = 'Action-Adventure';
        $game->description = 'Lorem ipsum dolor sit amet';
        $game->save();

        $game = new Game;
        $game->title = 'God of War';
        $game->developer = 'Santa Monica Studio';
        $game->releasedate = '2018-04-20';
        $game->category_id = 3;
        $game->user_id = 1;
        $game->price = 49;
        $game->genre = 'Action';
        $game->description = 'Lorem ipsum dolor sit amet';
        $game->save();

        $game = new Game;
        $game->title = 'Red Dead Redemption 2';
        $game->developer = 'Rockstar Games';
        $game->releasedate = '2018-10-26';
        $game->category_id = 1;
        $game->user_id = 1;
        $game->price = 59;
        $game->genre = 'Action-Adventure';
        $game->description = 'Lorem ipsum dolor sit amet';
        $game->save(); 
    }
}
