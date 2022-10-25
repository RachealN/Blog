<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('posts',[
            'posts' => $category->posts,
            'currentCategory' => $category,
        ]);
    }

}
