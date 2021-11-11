<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {

        return view('login.index');

    }

    public function login(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        // dd(bcrypt($request['password']));
        // dd(Auth::attempt(['email'=>$request['email'],'password'=> $request['password']]));
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])) {
            session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors(['email' => 'Wrong Credentils!']);
    }

    public function logout() {

        Auth::logout();
        return redirect('/');
        
    }
}
