<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AboutusController;
use App\Http\Controllers\backend\BlogCategoryController;
use App\Http\Controllers\backend\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // Backend Aboutus Routes

Route::prefix('about-us')->group(function () {
    Route::get('/', [AboutusController::class, 'index'])->name('backend.aboutus.index'); // List all records
    Route::get('/create', [AboutusController::class, 'create'])->name('backend.boutus.create'); // Show form to create a new record
    Route::post('/', [AboutusController::class, 'store'])->name('backend.aboutus.store'); // Store a new record
    Route::get('/{id}', [AboutusController::class, 'show'])->name('backend.aboutus.show'); // Show a single record
    Route::get('/{id}/edit', [AboutusController::class, 'edit'])->name('backend.aboutus.edit'); // Show form to edit a record
    Route::put('/{id}', [AboutusController::class, 'update'])->name('backend.aboutus.update'); // Update a record
    Route::delete('/{id}', [AboutusController::class, 'destroy'])->name('backend.aboutus.destroy'); // Delete a record

    });

//Backend BlogCategory Routes

Route::prefix('blog-categories')->group(function () {
    Route::get('/', [BlogCategoryController::class, 'index'])->name('backend.blogcategories.index'); // List all categories
    Route::get('/create', [BlogCategoryController::class, 'create'])->name('backend.blogcategories.create'); // Show form to create a new category
    Route::post('/', [BlogCategoryController::class, 'store'])->name('backend.blogcategories.store'); // Store a new category
    Route::get('/{id}', [BlogCategoryController::class, 'show'])->name('backend.blogcategories.show'); // Show a single category
    Route::get('/{id}/edit', [BlogCategoryController::class, 'edit'])->name('backend.blogcategories.edit'); // Show form to edit a category
    Route::put('/{id}', [BlogCategoryController::class, 'update'])->name('backend.blogcategories.update'); // Update a category
    Route::delete('/{id}', [BlogCategoryController::class, 'destroy'])->name('backend.blogcategories.destroy'); // Delete a category
});


//Backend Blog Routes
Route::prefix('blogs')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('backend.blogs.index'); // List all blogs
    Route::get('/create', [BlogController::class, 'create'])->name('backend.blogs.create'); // Show form to create a new blog
    Route::post('/', [BlogController::class, 'store'])->name('backend.blogs.store'); // Store a new blog
    Route::get('/{id}', [BlogController::class, 'show'])->name('backend.blogs.show'); // Show a single blog
    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('backend.blogs.edit'); // Show form to edit a blog
    Route::put('/{id}', [BlogController::class, 'update'])->name('backend.blogs.update'); // Update a blog
    Route::delete('/{id}', [BlogController::class, 'destroy'])->name('backend.blogs.destroy'); // Delete a blog
});

});
