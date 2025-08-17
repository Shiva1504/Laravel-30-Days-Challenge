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
