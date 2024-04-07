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

        // dd($request->all());
        $userInfo = $request->validate(['name' => 'required',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:5',
            'role' => 'required'
        ]);
       
       
        $userInfo['password'] = bcrypt($userInfo['password']);
        $user = User::create($userInfo);

        $user->addRole($userInfo['role']);
     

        return back()->with('message', 'Account created successfully');
    }

    public function authenticate(Request $request){
       
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->hasRole('admin')) {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/');
            }
            
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
