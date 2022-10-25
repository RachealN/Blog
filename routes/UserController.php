<?php

use App\Models\Category;
use App\Models\User;

class UserController
{
    public function getAuthor( User $author, Category $category)
    {
//        return view('posts',[
//            'posts' => $author->posts,
//            'categories' => $category->all()
//        ]);
    }
}
