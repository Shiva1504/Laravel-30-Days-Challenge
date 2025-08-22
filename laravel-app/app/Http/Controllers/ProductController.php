<?php

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
