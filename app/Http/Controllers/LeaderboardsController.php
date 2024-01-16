<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use App\Models\User;
use Illuminate\View\View;

class LeaderboardsController extends Controller
{
    //
    public function showLeaderboard () : View
    {
        $users = Leaderboard::orderBy('score', 'desc')
            ->get();
        $index = 0;
        foreach($users as $user){
            $name = User::where('id', $user['user_id'])->first(['name'])->name;
            $users[$index]['name'] = $name;
            $index++;
        }
        return View('leaderboard', ['users' => $users]);
    }
}
