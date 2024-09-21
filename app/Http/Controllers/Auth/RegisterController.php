<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function getRegisterView()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', "min:3"],
            'password' => ['required', "min:8"]
        ]);

        if(User::where('username', $credentials['username'])->first()) {
            return redirect('/register')
                ->withErrors('The username has already been taken.')
                ->withInput();
        }

        $user = User::create([
            'username' => $credentials['username'],
            'password' => bcrypt($credentials['password'])
        ]);

        Auth::login($user);
        return redirect('/');
    }
}
