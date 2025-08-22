# Day 7: Eloquent CRUD with Product model, controller, and routes


## ✅ Steps for Day-07

### 1. Model & Migration
```bash
php artisan make:model Product -m
```

This creates a Product model and a migration file.
Edit migration (database/migrations/xxxx_create_products_table.php):
```php
public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->decimal('price', 8, 2);
        $table->text('description')->nullable();
        $table->timestamps();
    });
}
```

Run migration:
```php
php artisan migrate
```
### 2. Seeder (optional for sample data)
```bash
php artisan make:seeder ProductSeeder
```

In ProductSeeder.php:
```php
public function run(): void
{
    \App\Models\Product::create([
        'name' => 'Laptop',
        'price' => 59999.99,
        'description' => 'A powerful laptop'
    ]);
}
```

Run:
```bash
php artisan db:seed --class=ProductSeeder
```

### 3. Controller for CRUD
```bash
php artisan make:controller ProductController --resource
```

In ProductController.php:
```php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List all products
    public function index()
    {
        return Product::all();
    }

    // Show single product
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    // Store new product
    public function store(Request $request)
    {
        $product = Product::create($request->only(['name', 'price', 'description']));
        return response()->json($product, 201);
    }

    // Update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->only(['name', 'price', 'description']));
        return response()->json($product, 200);
    }

    // Delete product
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(null, 204);
    }
}
```

### 4. Model Fillable
In Product.php:
```php
protected $fillable = ['name', 'price', 'description'];
```

### 5. Routes (routes/web.php)
```php
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);
```

## ✅ Testing
Now you can test in browser or Postman:
GET /products → List all
POST /products → Create
GET /products/{id} → Show single
PUT /products/{id} → Update
DELETE /products/{id} → Delete