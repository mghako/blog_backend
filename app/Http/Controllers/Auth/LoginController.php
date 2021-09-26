<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if(auth()->attempt($credentials)) {
            session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors(['email' => 'Wrong Credentils!']);
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
