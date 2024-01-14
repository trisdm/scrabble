<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{
    //
    public function getActiveUsers() : view {
        $results = User::where('user_type', UserType::USER)
            ->where('user_status', UserStatus::ACTIVE)
            ->get();
        print_r($results);
        return View('members');
    }

    public function deleteUser(int $userId) : view {
        $result = User::where('id', $userId)->delete();
        if($result) {
            return View('success');
        } else {
            return View('error');
        }
    }
}
