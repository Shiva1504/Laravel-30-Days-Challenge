<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

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

    public function show($id)
    {
        return Post::findOrFail($id);
    }
}
