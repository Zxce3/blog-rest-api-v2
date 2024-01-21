<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [BlogController::class, 'getPublishedPosts']);
Route::get('/drafts', [BlogController::class, 'getDrafts']);
Route::get('/posts/{id}', [BlogController::class, 'getPostById']);

Route::get('/authors', [BlogController::class, 'getAuthors']);
Route::get('/authors/{id}', [BlogController::class, 'getAuthorById']);

Route::get('/categories', [BlogController::class, 'getCategories']);
Route::get('/categories/{id}', [BlogController::class, 'getCategoryById']);
