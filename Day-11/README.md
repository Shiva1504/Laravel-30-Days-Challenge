# 📅 Day 11: Authentication Basics

Authentication is one of the most common features in web applications. Laravel provides built-in authentication scaffolding and tools to make it easy to implement.

---

## 🔑 What You'll Learn Today

* Setting up authentication using Laravel Breeze
* Understanding `Auth` facade and helpers
* Login, Registration, Logout basics
* Protecting routes with authentication middleware

---

## 🚀 1. Install Authentication Scaffolding

For Laravel 11, the recommended starter kit is **Laravel Breeze** (lightweight and simple).

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

This will scaffold **login, registration, password reset, and email verification**.

---

## 🚪 2. Authentication Routes

Breeze automatically provides routes for:

* `/register` → User Registration
* `/login` → User Login
* `/logout` → User Logout
* `/forgot-password` → Reset password

Check them in `routes/auth.php` (included by Breeze).

---

## 👤 3. The `Auth` Facade

Laravel provides multiple helpers for authentication:

```php
// Check if user is logged in
if (Auth::check()) {
    echo "Welcome, " . Auth::user()->name;
}

// Get current user
$user = Auth::user();

// Get ID of authenticated user
$userId = Auth::id();

// Logout user
Auth::logout();
```

---

## 🛡 4. Protecting Routes

You can restrict routes to authenticated users using the `auth` middleware.

```php
// routes/web.php
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

```

If the user is not logged in, they will be redirected to the login page.

---

## ✅ Task for Today

1. Install **Laravel Breeze** in your `laravel-30days-app`.
2. Register a new user.
3. Try logging in & out.
4. Protect a route with `auth` middleware.

---

## 📌 Summary

* Installed Laravel Breeze for authentication
* Understood how `Auth` works
* Learned how to protect routes with middleware
* Implemented basic login, registration, and logout

---

📅 **Next Up (Day 12): Authorization (Roles & Permissions)**
