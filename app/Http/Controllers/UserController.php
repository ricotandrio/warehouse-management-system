<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function getLoginView()
    {
        if(Auth::check()) {
            return redirect('/');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login_email' => ['required', 'email'],
            'login_password' => ['required']
        ]);

        if (!Auth::attempt([
            'email' => $credentials['login_email'], 
            'password' => $credentials['login_password']
        ])) {
            return redirect('/login')
                ->withErrors(['login_email' => 'The provided credentials do not match our records.'])
                ->withInput();
        }

        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'register_name' => ['required', 'min:3', 'max:50'],
            'register_email' => ['required', 'email', Rule::unique('users', 'email')],
            'register_password' => ['required', 'min:8', 'max:20']
        ]);

        $credentials['encrypted_password'] = bcrypt($credentials['register_password']);

        $user = User::create([
            'name' => $credentials['register_name'],
            'email' => $credentials['register_email'],
            'password' => $credentials['encrypted_password'],
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
