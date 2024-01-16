<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use Illuminate\View\View;

class LeaderboardController extends Controller
{
    //
    public function showLeaderboard () : View
    {
        $users = Leaderboard::with('users')
            ->orderBy('score', 'desc')
            ->get();
        return View('leaderboard', ['users' => $users]);
    }
}
