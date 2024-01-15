<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GamesController extends Controller
{
    //
    public function getGames() : View {
        $array = Game::all();
        print_r($array);
        return View ('recentGames');
    }

    public function add
}
