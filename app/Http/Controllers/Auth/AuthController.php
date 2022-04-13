<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;

class AuthController extends Controller
{
    public function index() {
        return Inertia::render('Users/Auth');
    }
    
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended();
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function signUp() {
        return Inertia::render('Users/Auth');
    }

    public function createAccouint(Request $request) {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'confirm_password' => ['required', 'string', 'min:6']
        ]);

        if($credentials['password'] !== $credentials['confirm_password']) {
            return back()->withErrors([
                'email' => "Password don't match",
            ])->onlyInput('email');
        }

        $user = User::create($credentials);

        Auth::login($user);

        if (Auth::check()) {
            $request->session()->regenerate();
 
            return redirect('/');
        }
 
        return back()->withErrors([
            'email' => 'There was and error trying login the new account',
        ])->onlyInput('email');
    }

    public function logout() {
        if(Auth::check()) {
            Auth::logout();

            return redirect()->route('home');
        }

        return redirect()->route('home')->with('warning', "You aren't signed in");
    }
}
