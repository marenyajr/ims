<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function login(){
        return view('users.login');
    }

    public function create(){

        return view('users.register');
    }

    public function store(Request $request){
      
        $userInfo = $request->validate([
            'name' => 'required',
            'user_name' => 'required|unique:users',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:5|confirmed'
        ]);

        $userInfo['role_id'] = 1;
        $userInfo['password'] = bcrypt($userInfo['password']);
        $user = User::create($userInfo);

        auth()->login($user);

        return redirect('/')->with('message', 'Account created successfully');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
