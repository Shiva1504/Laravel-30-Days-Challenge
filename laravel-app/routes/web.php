<?php

use Illuminate\Support\Facades\Route;

// Default welcome route
Route::get('/', function () {
    return view('welcome');
});

// 1️⃣ Basic Route
Route::get('/hello', function () {
    return "Hello Laravel";
});

// 2️⃣ Route with Required Parameter
Route::get('/user/{id}', function ($id) {
    return "User ID: " . $id;
});

// 3️⃣ Route with Optional Parameter
Route::get('/post/{id?}', function ($id = null) {
    return $id ? "Post ID: $id" : "No Post ID provided";
});

// 4️⃣ Named Route
Route::get('/dashboard', function () {
    return "Welcome to Dashboard";
})->name('dashboard');

// Example: generate URL for dashboard
Route::get('/go-to-dashboard', function () {
    return redirect()->route('dashboard');
});

// 5️⃣ View Route
Route::view('/about', 'about');


use App\Http\Controllers\HelloController;

// Controller route (index method)
Route::get('/hello-controller', [HelloController::class, 'index']);

// Controller route with parameter
Route::get('/hello-user/{id}', [HelloController::class, 'showUser']);

use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);




// Example of using the Post model
use App\Models\Post;

// Create new post
Route::get('/post/create', function () {
    $post = Post::create([
        'title' => 'My First Post',
        'content' => 'This is content from Day 4.'
    ]);
    return $post;
});

// Get all posts
Route::get('/posts', function () {
    return Post::all();
});

// Find a post by id
Route::get('/post/{id}', function ($id) {
    return Post::find($id);
});

// Laravel Blade Templates to separate layout & content.
Route::view('/home', 'home');
Route::view('/about', 'about');

// Example of using a view for users (Day 6)
Route::view('/users', 'users');


// Day 7 - Eloquent CRUD with Product model, controller, and routes
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);
