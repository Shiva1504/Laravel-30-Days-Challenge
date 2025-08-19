# Day 5: Blade Templating Basics

Today we explored **Laravel Blade Templates** to separate layout & content.

---

## 🔹 Step 1: Create a Layout
`resources/views/layouts/app.blade.php`

```html
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 30 Days - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1 class="mb-4">Laravel 30 Days</h1>

    <div class="card p-4">
        @yield('content')
    </div>
</body>
</html>
```

## 🔹 Step 2: Create Child Views

### Home View
resources/views/home.blade.php
```html
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h2>Welcome to Day 5</h2>
    <p>This is the home page using Blade template inheritance.</p>
@endsection
```

### About View
resources/views/about.blade.php
```html
@extends('layouts.app')

@section('title', 'About')

@section('content')
    <h2>About Us</h2>
    <p>This page is rendered using Blade templating system.</p>
@endsection
```

## 🔹 Step 3: Add Routes
routes/web.php
```php
Route::view('/home', 'home');
Route::view('/about', 'about');
```

## 🔹 Step 4: Blade Features
@extends('layouts.app') → Reuse layout
@section('title') → Set page title
@yield('content') → Insert unique content
@if, @foreach, @include → Control structures (we’ll use later)

## ✅ What We Learned
Create a base layout with Blade.
Use @extends, @section, @yield for clean templates.
Reuse layouts across multiple views.