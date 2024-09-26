<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function viewLoginPage()
    {
        if(Auth::check()) {
            return redirect('/');
        }
        return view('auths.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', "min:3"],
            'password' => ['required', "min:8"]
        ]);

        if (!Auth::attempt([
            'username' => $credentials['username'], 
            'password' => bcrypt($credentials['password'])
        ])) {
            return redirect('/login')
                ->withErrors('The provided credentials do not match our records.')
                ->withInput();
        }

        $request->session()->regenerate();
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
