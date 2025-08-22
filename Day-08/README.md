# Day-08: Form Validation

In this lesson, we learned how to **validate user input in Laravel** before saving it into the database.

---

## ✅ Steps Covered

### 1. Created a `Post` Model & Migration

```bash
// No need to run if already exist
php artisan make:model Post -m
```

In `database/migrations/xxxx_create_posts_table.php`:

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

```bash
php artisan migrate
```

---

### 2. Controller with Validation

```bash
// No need to run if already exist
php artisan make:controller PostController --resource
```

In `PostController.php`:

```php
public function store(Request $request)
{
    // Validation
    $validated = $request->validate([
        'title'   => 'required|min:3|max:255',
        'content' => 'required|min:10',
    ]);

    // Store
    $post = Post::create($validated);

    return response()->json($post, 201);
}
```

---

### 3. Model Fillable

In `Post.php`:

```php
protected $fillable = ['title', 'content'];
```

---

### 4. Routes

In `routes/web.php`:

```php
use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);
```

---

### 5. Testing

#### ✅ Valid Input

`POST /posts`

```json
{
  "title": "My First Post",
  "content": "This is a sample post content."
}
```

Result: Saves successfully.

#### ❌ Invalid Input

```json
{
  "title": "Hi",
  "content": "short"
}
```

Result:

```json
{
  "message": "The given data was invalid.",
  "errors": {
    "title": ["The title must be at least 3 characters."],
    "content": ["The content must be at least 10 characters."]
  }
}
```

---

---

➡️ **Next (Day-09):** We will move into either **Authentication (Login/Register)** or **Query Builder basics** before authentication.
