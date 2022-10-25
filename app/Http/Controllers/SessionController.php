<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //validate the request
        $attributes = request()->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        //attempt to authenticate and Login a user
        //based on provided credentials
        if(! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email', 'Your provide credentials could not be verified'
            ]);

        }
        session()->regenerate();

        return redirect('/')->with('success','Welcome Back!');



    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success','GoodBye!');
    }
}
