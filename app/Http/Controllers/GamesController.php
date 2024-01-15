<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
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

    public function addGame() : View {
        $users = User::where(['user_type' => UserType::USER])
            ->where(['user_status' => UserStatus::ACTIVE])
            ->get();
        return View('newGame', ['users' => $users]);
    }

    public function handleAddGame(Request $request) : RedirectResponse
    {

    }
}
