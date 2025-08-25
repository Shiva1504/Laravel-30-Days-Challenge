# Day 10: Middleware

## 📌 What is Middleware?

Middleware in Laravel provides a convenient way to filter HTTP requests entering your application. It acts like a "bridge" between the request and the response.

For example:

* **`auth` middleware** ensures the user is logged in.
* **`csrf` middleware** protects against cross-site request forgery.
* **`throttle` middleware** limits the number of requests (rate limiting).

---

## 🔹 How Middleware Works

When a request enters your Laravel application:

1. The request passes through a **stack of middleware**.
2. Middleware can **modify, reject, or pass** the request.
3. After the request is processed by the route/controller, the response also passes back through the middleware stack.

---

## 🔹 Creating a Custom Middleware

Command:

```bash
php artisan make:middleware CheckAdmin
```

Generated file: `app/Http/Middleware/CheckAdmin.php`

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return redirect('/');
        }

        return $next($request);
    }
}
```

---

## 🔹 Registering Middleware

In `app/Http/Kernel.php`, add to `$routeMiddleware`:

```php
'admin' => \App\Http\Middleware\CheckAdmin::class,
```

---

## 🔹 Using Middleware in Routes

In `routes/web.php`:

```php
Route::get('/admin', function () {
    return "Welcome Admin!";
})->middleware('admin');

// Group example
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});
```

---

## ✅ Summary

* Middleware filters requests in Laravel.
* Laravel has many **built-in middleware**.
* You can create **custom middleware** to add application-specific checks.
* Middleware can be applied to **single routes** or **groups of routes**.
