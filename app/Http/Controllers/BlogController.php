<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stephenjude\FilamentBlog\Models\Post;
use Stephenjude\FilamentBlog\Models\Author;
use Stephenjude\FilamentBlog\Models\Category;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function getPublishedPosts()
    {
        $posts = Post::published()->get();
        return response()->json($posts);
    }

    public function getDrafts()
    {
        $drafts = Post::draft()->get();
        return response()->json($drafts);
    }

    public function getPostById($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $postWithDetails = $post->load(['author', 'category']);

        return response()->json($postWithDetails);
    }

    public function getAuthors()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    public function getAuthorById($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        return response()->json($author);
    }

    public function getCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function getCategoryById($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json($category);
    }
    public function getMedia($filename)
    {
        $path = 'uploads/' . $filename; // Adjust the path based on your storage configuration
        
        // Check if the file exists
        if (Storage::exists($path)) {
            // Return the file as a response
            return response()->file(storage_path('app/' . $path));
        } else {
            // Return a 404 response if the file is not found
            return response()->json(['error' => 'File not found'], 404);
        }
    }
}
