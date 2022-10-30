<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/appointments', [AppointmentController::class, 'index']);
Route::get('/appointments/filter', [AppointmentController::class, 'filter']);
Route::post('/appointments/new',[AppointmentController::class, 'store'] );
Route::patch('/appointments/{appointment}/edit', [AppointmentController::class, 'update']);
Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy']);



Route::get('/', [PostController::class, 'index'])->name('home');
//    $posts = Post::when($request->search, function ($query, $search) {
//        return $query->where('title', 'like', $search = "%{$search}%")
//            ->orWhere('body', 'like', $search);
//    })->latest()->get();
//
//    $categories = Category::all();
//
//    return view('posts', compact('posts', 'categories'));
//)->name('home');

Route::post('newsletter', NewsletterController::class);

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('categories/{category:slug}', [CategoryController::class,'show']);


Route::post('logout', [SessionController::class,'destroy'])->middleware('auth');
Route::get('login', [SessionController::class,'create'])->middleware('guest');
Route::post('login', [SessionController::class,'store'])->middleware('guest');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);
});

Route::get('authors/{author:username}', function (User $author){
    return view('posts',[
        'posts' => $author->posts,
    ]);

}





);

