<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Models\Game;
use App\Models\Leaderboard;
use App\Models\MemberGame;
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
        $dd = $request->input('day');
        $mm = $request->input('month');
        $yyyy = $request->input('year');



        $error = false;
        $store = [];

        if($playerId1 != "" && $playerScore1 != "") {
            if($playerId1 == $playerId2 || $playerId1 == $playerId3 || $playerId1 == $playerId4)
            {
                $error = true;
            } else {
                $store[$playerId1] = $playerScore1;
            }
        } else {
            $error = true;
        }


        if($playerId2 != "" && $playerScore2 != "") {
            if($playerId2 == $playerId1 || $playerId2 == $playerId3 || $playerId2 == $playerId4)
            {
                $error = true;
            } else {
                $store[$playerId2] = $playerScore2;
            }
        } else {
            $error = true;
        }

        if($playerId3 != "" && $playerScore3 != "") {
            if($playerId3 == $playerId1 || $playerId3 == $playerId2 || $playerId3 == $playerId4)
            {
                $error = true;
            } else {
                $store[$playerId3] = $playerScore3;
            }
        } else {
            $error = true;
        }

        if($playerId4 != "" && $playerScore4 != "") {
            if($playerId4 == $playerId1 || $playerId4 == $playerId2 || $playerId4 == $playerId3)
            {
                $error = true;
            } else {
                $store[$playerId4] = $playerScore4;
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
            $dateFormat = "$yyyy - $mm - $dd";
            $date = Carbon::createFromFormat('Y-m-d H', $dateFormat)->toDateTimeString();
            $gameId = Game::insertGetId([
                'date' => $date
            ]);

            $max = 0;
            foreach($store as $key => $value) {
                if($value >= $max){
                    $max = $value;
                }
            }
            foreach($store as $userId => $score) {
                $winner = false;
                if($score == $max) {
                    $winner = true;
                }
                MemberGame::insert([
                    'game_id' => $gameId,
                    'user_id' => $userId,
                    'winner'  => $winner
                ]);


                $leaderBoard = Leaderboard::where('user_id', $userId)->get();
                if(empty($leaderBoard)) {
                    Leaderboard::insert([
                        'user_id' => $userId,
                        'score' => $score,
                        'games_played' => 1,
                        'average' => $score * 1.00
                    ]);
                } else {
                    $currentScore = $leaderBoard[0]['score'];
                    $gamesPlayed = $leaderBoard[0]['games_played'] + 1;

                    $newScore = $currentScore + $score;
                    $newAverage = $newScore / $gamesPlayed;

                    Leaderboard::where(['user_id' => $userId])
                        ->update(
                            ['score' => $newScore,
                            'average' => $newAverage,
                            'games_played' => $gamesPlayed]);
                }
            }
            return redirect('recent-games');
        }
    }
}
