<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => ['required','email','max:255','unique:users,email', new \App\Rules\ValidateEmailUniajc],
            'password' => 'required|min:5|max:255',
            'terms' => 'required'
        ]);
        $attributes['id_rol'] = 2;
        $user = User::create($attributes);
        auth()->login($user);


        return redirect('/dashboard');
    }
}
