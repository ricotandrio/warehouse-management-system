<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function viewSpecificUserPage($user_id)
    {
        $user = User::find($user_id);

        return view('profile', ['user' => $user]);
    }
}
