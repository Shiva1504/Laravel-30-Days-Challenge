# Day 4: Models & Database Basics

Today we learned about **Models, Migrations, and Eloquent ORM** in Laravel.

---

## 🔹 Step 1: Create a Model with Migration
```bash
php artisan make:model Post -m
```


This creates:

app/Models/Post.php
database/migrations/xxxx_xx_xx_create_posts_table.php


## 🔹 Step 2: Define Database Table
Edit the migration file:
```php
public function up(): void
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->timestamps();
    });
}
```

Run migration:
```php
php artisan migrate
```

## 🔹 Step 3: Configure Model
In app/Models/Post.php, allow mass assignment:
```php
protected $fillable = ['title', 'content'];
```

## 🔹 Step 4: Add Routes for Testing
In routes/web.php:
```php
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

```


## 🔹 Output
/post/create → Creates a new post
/posts → Shows all posts
/post/{id} → Shows a single post


## ✅ What We Learned
How to create Models
How to use Migrations
Basics of Eloquent ORM