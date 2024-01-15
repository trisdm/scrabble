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

    public function handleAddGame(Request $request) : RedirectResponse | View
    {
        $playerId1 =  $request->input('player_1_id');
        $playerId2 =  $request->input('player_2_id');
        $playerId3 =  $request->input('player_3_id');
        $playerId4 =  $request->input('player_4_id');

        $playerScore1 =  $request->input('player_1_score');
        $playerScore2 =  $request->input('player_2_score');
        $playerScore3 =  $request->input('player_3_score');
        $playerScore4 =  $request->input('player_4_score');

        if($playerId1 != "" && $playerScore1 != "") {
            if($playerId1 == $playerId2 || $playerId1 == $playerId3 || $playerId1 == $playerId4)
            {
                $error = true;
            }
        } else {
            $error = true;
        }


        if($playerId2 != "" && $playerScore2 != "") {
            if($playerId2 == $playerId1 || $playerId2 == $playerId3 || $playerId2 == $playerId4)
            {
                $error = true;
            }
        } else {
            $error = true;
        }

        if($playerId3 != "" && $playerScore3 != "") {
            if($playerId3 == $playerId1 || $playerId3 == $playerId2 || $playerId3 == $playerId4)
            {
                $error = true;
            }
        } else {
            $error = true;
        }

        if($playerId4 != "" && $playerScore4 != "") {
            if($playerId4 == $playerId1 || $playerId4 == $playerId2 || $playerId4 == $playerId3)
            {
                $error = true;
            }
        } else {
            $error = true;
        }


        if($playerId1 == "" && $playerId2 == "" && $playerId4 == "" && $playerId3 == "" ) {
            $error = true;
        }

        if($playerId1 != "" && $playerId2 == "" && $playerId4 == "" && $playerId3 == "" ) {
            $error = true;
        }

        if($playerId1 == "" && $playerId2 != "" && $playerId4 == "" && $playerId3 == "" ) {
            $error = true;
        }

        if($playerId1 == "" && $playerId2 == "" && $playerId4 != "" && $playerId3 == "" ) {
            $error = true;
        }

        if($playerId1 == "" && $playerId2 == "" && $playerId4 == "" && $playerId3 != "" ) {
            $error = true;
        }


        if($error){
            return View('add-game');
        } else {


            Game::





            return redirect('recent-games');

        }
    }
}
