<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'name' => 'required|min:5|max:255',
            'username' => 'required|min:7|max:255|unique:users,username',
            'email' => 'required|email|max:255',
            'password' => 'required|min:7|max:255'

        ]);

        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/')->with('success','Your account has been succesfully created!');

    }
}
