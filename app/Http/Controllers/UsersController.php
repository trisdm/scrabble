<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function editMember(Request $request) : view {
        $id = $request->query("id");

        $member = User::where('user_type', UserType::USER)
            ->where('user_status', UserStatus::ACTIVE)
            ->where('id', $id)
            ->get();

        return View('editMember', ['member' => $member]);
    }

    public function handleEditMember(Request $request) : RedirectResponse {
        $name = $request->input("name");
        $id   = $request->input("user_id");
        $email= $request->input("email");

        User::where('id', $id)
            ->update(['email' => $email, 'name' => $name]);

        return redirect('/members');
    }


    public function handleDeleteMember(Request $request) : RedirectResponse {
        $id   = $request->input("user_id");
        User::where('id', $id)
            ->update(['user_status' => UserStatus::DELETED->value]);
        return redirect('/members');
    }

    public function newMember() :View
    {
        return View('newMember');
    }

    public function handleNewMember(Request $request) :RedirectResponse
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        User::create([
            'name' => $name,
            'email'=> $email,
            'password' => Hash::make($password)
        ]);
        return redirect('members');
    }
}
