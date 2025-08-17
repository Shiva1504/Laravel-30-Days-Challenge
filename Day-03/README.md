# Day 3 – Controllers

## 🎯 Goal
Learn how to create controllers in Laravel, understand their purpose, and use them to handle route logic.

---

## 📌 What is a Controller?
- A **Controller** groups related route logic into a single class.
- Helps keep `web.php` clean and organized.
- Stored inside `app/Http/Controllers/`.

---

## 🛠 Creating a Controller

### 1️⃣ Basic Controller
Run the Artisan command:
```bash
php artisan make:controller HelloController
```

This creates:
```
app/Http/Controllers/HelloController.php
```

### 2️⃣ Add a Method
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    // Method to return a greeting
    public function index()
    {
        return "Hello from Controller!";
    }

    // Method with parameter
    public function showUser($id)
    {
        return "User ID from Controller: " . $id;
    }
}

```

### 3️⃣ Define Route for Controller
Edit routes/web.php:

```
use App\Http\Controllers\HelloController;

// Controller route (index method)
Route::get('/hello-controller', [HelloController::class, 'index']);

// Controller route with parameter
Route::get('/hello-user/{id}', [HelloController::class, 'showUser']);

```

### 4️⃣ Resource Controller (Optional)

Create a resource controller:
```
php artisan make:controller PostController --resource
```
This will generate methods for CRUD:
index → list all posts
create → show form
store → save data
show → view single post
edit → edit form
update → update post
destroy → delete post

Add resource route:
```
use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);
```

Now Laravel automatically maps routes like:
GET /posts
GET /posts/{id}
POST /posts
PUT /posts/{id}
DELETE /posts/{id}


## 🔍 How to Test
/hello-controller → shows Hello from Controller!
/hello-user/15 → shows User ID from Controller: 15
/posts → handled by PostController@index

## 📚 Tasks for Day 3
 Create HelloController with two methods (index, showUser).
 Add routes that point to controller methods.
 Create PostController as a resource controller.
 Explore php artisan route:list to see all routes.