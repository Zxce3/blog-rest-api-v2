<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stephenjude\FilamentBlog\Models\Post;
use Stephenjude\FilamentBlog\Models\Author;
use Stephenjude\FilamentBlog\Models\Category;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Get a list of published blog posts.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPublishedPosts()
    {
        $posts = Post::published()->get();
        return response()->json($posts);
    }

    /**
     * Get a list of draft blog posts.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDrafts()
    {
        $drafts = Post::draft()->get();
        return response()->json($drafts);
    }

    /**
     * Get a specific blog post by its ID, including details about the author and category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPostById($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $postWithDetails = $post->load(['author', 'category']);

        return response()->json($postWithDetails);
    }

    /**
     * Get a list of all blog authors.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthors()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    /**
     * Get a specific blog author by their ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthorById($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        return response()->json($author);
    }

    /**
     * Get a list of all blog categories.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Get a specific blog category by its ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategoryById($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

    /**
     * Get a specific media file by its filename.
     *
     * @param  string  $filename
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
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

    /**
     * Search for posts based on a keyword.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchPosts(Request $request)
    {
        $keyword = $request->input('keyword');

        if (empty($keyword)) {
            return response()->json(['error' => 'Keyword parameter is required'], 400);
        }

        $searchResults = Post::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('content', 'like', '%' . $keyword . '%')
            ->published()
            ->get();

        return response()->json($searchResults);
    }
}
