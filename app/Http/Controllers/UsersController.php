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
        $members = User::where('user_type', UserType::USER)
            ->where('user_status', UserStatus::ACTIVE)
            ->get();

        return View('members', ['members' => $members]);
    }

    public function viewMember(Request $request) : view {
        $id = $request->query("id");

        $member = User::where('user_type', UserType::USER)
            ->where('user_status', UserStatus::ACTIVE)
            ->where('id', $id)
            ->get();

        return View('viewMember', ['member' => $member]);
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
