<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\leaderboardController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get("members", [UsersController::class, 'getActiveUsers']);

Route::get("leaderboard", [LeaderboardController::class, 'getActiveUsers']);

Route::get("new-member", [UsersController::class, 'newMember']);

Route::post("new-member", [UsersController::class, 'handleNewMember']);

Route::get("edit-member", [UsersController::class, 'editMember']);

Route::post("edit-member", [UsersController::class, 'handleEditMember']);

Route::post("delete-member", [UsersController::class, 'handleDeleteMember']);

Route::get("view-member", [UsersController::class, 'viewMember']);

Route::get("recent-games", [GamesController::class, 'getGames']);

Route::get("add-game", [UsersController::class, 'addGames']);

Route::post("add-game", [UsersController::class, 'handleAddGames']);
