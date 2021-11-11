<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store(Request $request){
        //
        $attributes = $request->validate([
            'username' => 'required|string|min:3|max:255|unique:users,username',
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|min:3|max:255|unique:users,email',
            'password' => 'required|string|min:3|max:255'
        ]);
        $attributes['type'] = 'admin';
        
        User::create($attributes);

        return redirect('/');

    }
}
