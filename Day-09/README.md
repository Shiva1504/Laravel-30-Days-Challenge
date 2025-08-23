# 📖 Day 09 - Laravel Request Lifecycle

On **Day 9**, we will dive into the **Laravel Request Lifecycle**. Understanding how a request flows through Laravel is essential for mastering the framework, as it helps you debug issues, optimize performance, and extend functionality effectively.

---

## 🔄 What is the Laravel Request Lifecycle?

The **request lifecycle** is the sequence of steps a request goes through from the moment it enters the Laravel application until a response is sent back to the client.

---

## 🛤 Steps in the Request Lifecycle

### 1. **Public/index.php**

* The entry point for all requests.
* Loads the Composer autoloader and bootstrap files.
* Creates an instance of the Laravel application.

```php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
```

---

### 2. **HTTP Kernel**

* The request is passed to the **HTTP Kernel** (`app/Http/Kernel.php`).
* Kernel bootstraps the framework (loads environment, config, logging, providers, etc.).
* Defines the global middleware stack.

```php
class Kernel extends HttpKernel {
    protected $middleware = [
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
    ];
}
```

---

### 3. **Service Providers**

* All **service providers** listed in `config/app.php` are loaded.
* They register services like routing, DB, events, mail, etc.

---

### 4. **Routing**

* The request is handed over to the **Router**.
* Laravel matches the request URI to a route defined in `routes/web.php` or `routes/api.php`.
* Applies route-specific middleware.

```php
Route::get('/hello', function () {
    return 'Hello World';
});
```

---

### 5. **Controller / Closure Execution**

* If a controller/closure is matched, it gets executed.
* Dependencies are resolved via the **Service Container**.

---

### 6. **Response**

* The controller returns a response (string, JSON, view, etc.).
* The response is passed through middleware.
* Finally sent to the **browser/client**.

---

## 🖼 Diagram

```
Request → index.php → Kernel → Middleware → Service Providers → Router → Controller → Response
```

---

## ✅ Summary

* Request starts at **index.php**.
* Handled by **HTTP Kernel**.
* Middleware and **service providers** boot.
* Request is routed to a **controller/closure**.
* Response is sent back to client.

---

## 📝 Task for Today

* Add a route and debug the lifecycle using `dd()` at different points.
* Example:

```php
Route::get('/test', function () {
    dd('Reached Controller');
});
```

* Check logs in `storage/logs/laravel.log` to trace the flow.

---

🚀 Tomorrow (Day-10), we’ll learn about **Middleware** in Laravel.
