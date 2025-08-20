# Day 6: Blade Directives (Loops, Conditionals, Includes)

Today we explored **Blade directives** like loops, conditionals, and including partials.

---

## 🔹 Step 1: Create Users Page with Loop & Conditionals
`resources/views/users.blade.php`
```blade
@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <h2>User List</h2>

    @php
        $users = ['Shiva', 'Lakshman', 'Anjali', 'Ravi'];
    @endphp

    @if(count($users) > 0)
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">
                    {{ $loop->iteration }}. {{ $user }}
                    @if($loop->first)
                        <span class="badge bg-success">First</span>
                    @endif
                    @if($loop->last)
                        <span class="badge bg-info">Last</span>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>No users found.</p>
    @endif

    @include('partials.footer')
@endsection
```

## 🔹 Step 2: Create a Footer Partial
resources/views/partials/footer.blade.php
```blade
<hr>
<p class="text-center text-muted">
    &copy; {{ date('Y') }} Laravel 30 Days Challenge
</p>
```

## 🔹 Step 3: Add Route
routes/web.php
```php
Route::view('/users', 'users');
```

## 🔹 Step 4: Blade Features Learned

@if, @elseif, @else, @endif → Conditional rendering
@foreach, @forelse → Loops
$loop variable → Provides info like first, last, iteration
@include('partials.footer') → Reusable partial view


## ✅ What We Learned
Display dynamic lists using loops.
Add conditions with Blade directives.
Create and include partials for reusable UI components.