# Day 2 – Routing Basics

## 🎯 Goal
Understand how routing works in Laravel and create different types of routes.

---

## 📌 What is Routing?
Routing is how Laravel maps **URLs** to specific **logic** (controllers, closures, or views).  
All routes are defined in the `routes/` folder:

- `routes/web.php` → For browser routes (returns HTML/views)
- `routes/api.php` → For API routes (returns JSON)
- `routes/console.php` → For Artisan commands
- `routes/channels.php` → For broadcasting channels

---

## 🛠 Examples

### 1️⃣ Basic Route
```php
// routes/web.php
Route::get('/', function () {
    return 'Welcome to Day 2 – Routing Basics!';
});
```

### 2️⃣ Route with Parameters
```php
Route::get('/user/{id}', function ($id) {
    return "User ID: " . $id;
});
```
➡ Example: /user/10 → User ID: 10

### 3️⃣ Route with Optional Parameter
```php
Route::get('/post/{id?}', function ($id = null) {
    return $id ? "Post ID: $id" : "No Post ID provided";
});
```

### 4️⃣ Route with Named Parameters
```php
Route::get('/order/{id}/item/{item}', function ($id, $item) {
    return "Order $id contains item: $item";
});
```

### 5️⃣ Named Routes
```php
Route::get('/dashboard', function () {
    return "Welcome to Dashboard";
})->name('dashboard');

// Access with route() helper
$url = route('dashboard');  // http://127.0.0.1:8000/dashboard
```

### 6️⃣ Redirect Routes
```php
Route::redirect('/home', '/dashboard');
```

### 7️⃣ View Routes
```php
Route::view('/about', 'about'); // Loads resources/views/about.blade.php
```

## ✅ Now you can test:
Run 
```
php artisan serve
```
/hello → shows Hello Laravel
/user/10 → shows User ID: 10
/post/99 → shows Post ID: 99
/post → shows No Post ID provided
/dashboard → shows Welcome to Dashboard
/go-to-dashboard → redirects to /dashboard
/about → loads about.blade.php

##📚 Tasks for Day 2
 Create a basic route (/hello) returning "Hello Laravel".
 Add a route with a required parameter (/user/{id}).
 Add a route with an optional parameter (/post/{id?}).
 Define a named route (/dashboard) and access it using route('dashboard').
 Add a simple about.blade.php view and load it using Route::view.