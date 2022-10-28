<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);

        try {
            $newsletter->subscribe(request('email'));

        }catch (Exception $e){

            throw ValidationException::withMessages([
                'email' => 'This email couldnot be added to our newsletter list, please provide a vaild email!!'
            ]);

        }
        return redirect('/')->with('Success', 'You are now signed up for our Newsletter!');
    }
}
