<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\LeaderboardsController;
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
})->name('home');

Route::get("leaderboard", [LeaderboardsController::class, 'showLeaderboard']);

Route::get("members", [UsersController::class, 'getActiveUsers']);

Route::get("new-member", [UsersController::class, 'newMember']);

Route::post("new-member", [UsersController::class, 'handleNewMember']);

Route::get("edit-member", [UsersController::class, 'editMember']);

Route::post("edit-member", [UsersController::class, 'handleEditMember']);

Route::post("delete-member", [UsersController::class, 'handleDeleteMember']);

Route::get("view-member", [UsersController::class, 'viewMember']);

Route::get("recent-games", [GamesController::class, 'getGames']);

Route::get("add-game", [GamesController::class, 'addGame']);

Route::post("add-game", [GamesController::class, 'handleAddGame']);
