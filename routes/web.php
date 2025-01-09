<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AboutusController;
use App\Http\Controllers\backend\BlogCategoryController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\CarouselController;
use App\Http\Controllers\backend\ClientController;
use App\Http\Controllers\backend\ContactusMessageController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\UserProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.layout.main');
    })->name('dashboard');


    // Backend Aboutus Routes

Route::prefix('admin/about-us')->group(function () {
    Route::get('/', [AboutusController::class, 'index'])->name('backend.aboutus.index'); // List all records
    Route::get('/create', [AboutusController::class, 'create'])->name('backend.boutus.create'); // Show form to create a new record
    Route::post('/', [AboutusController::class, 'store'])->name('backend.aboutus.store'); // Store a new record
    Route::get('/{id}', [AboutusController::class, 'show'])->name('backend.aboutus.show'); // Show a single record
    Route::get('/{id}/edit', [AboutusController::class, 'edit'])->name('backend.aboutus.edit'); // Show form to edit a record
    Route::put('/{id}', [AboutusController::class, 'update'])->name('backend.aboutus.update'); // Update a record
    Route::delete('/{id}', [AboutusController::class, 'destroy'])->name('backend.aboutus.destroy'); // Delete a record

    });

//Backend BlogCategory Routes

Route::prefix('admin/blog-categories')->group(function () {
    Route::get('/', [BlogCategoryController::class, 'index'])->name('backend.blogcategories.index'); // List all categories
    Route::get('/create', [BlogCategoryController::class, 'create'])->name('backend.blogcategories.create'); // Show form to create a new category
    Route::post('/', [BlogCategoryController::class, 'store'])->name('backend.blogcategories.store'); // Store a new category
    Route::get('/{id}', [BlogCategoryController::class, 'show'])->name('backend.blogcategories.show'); // Show a single category
    Route::get('/{id}/edit', [BlogCategoryController::class, 'edit'])->name('backend.blogcategories.edit'); // Show form to edit a category
    Route::put('/{id}', [BlogCategoryController::class, 'update'])->name('backend.blogcategories.update'); // Update a category
    Route::delete('/{id}', [BlogCategoryController::class, 'destroy'])->name('backend.blogcategories.destroy'); // Delete a category
});


//Backend Blog Routes
Route::prefix('admin/blogs')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('backend.blogs.index'); // List all blogs
    Route::get('/create', [BlogController::class, 'create'])->name('backend.blogs.create'); // Show form to create a new blog
    Route::post('/', [BlogController::class, 'store'])->name('backend.blogs.store'); // Store a new blog
    Route::get('/{id}', [BlogController::class, 'show'])->name('backend.blogs.show'); // Show a single blog
    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('backend.blogs.edit'); // Show form to edit a blog
    Route::put('/{id}', [BlogController::class, 'update'])->name('backend.blogs.update'); // Update a blog
    Route::delete('/{id}', [BlogController::class, 'destroy'])->name('backend.blogs.destroy'); // Delete a blog
});

//Backend Carousel Routes
Route::prefix('admin/carousels')->group(function () {
    Route::get('/', [CarouselController::class, 'index'])->name('backend.carousels.index'); // List all carousels
    Route::get('/create', [CarouselController::class, 'create'])->name('backend.carousels.create'); // Show form to create a new carousel
    Route::post('/', [CarouselController::class, 'store'])->name('backend.carousels.store'); // Store a new carousel
    Route::get('/{id}', [CarouselController::class, 'show'])->name('backend.carousels.show'); // Show a single carousel
    Route::get('/{id}/edit', [CarouselController::class, 'edit'])->name('backend.carousels.edit'); // Show form to edit a carousel
    Route::put('/{id}', [CarouselController::class, 'update'])->name('backend.carousels.update'); // Update a carousel
    Route::delete('/{id}', [CarouselController::class, 'destroy'])->name('backend.carousels.destroy'); // Delete a carousel
});


//Backend Client Routes
Route::prefix('admin/clients')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('backend.clients.index'); // List all clients
    Route::get('/create', [ClientController::class, 'create'])->name('backend.clients.create'); // Show form to create a new client
    Route::post('/', [ClientController::class, 'store'])->name('backend.clients.store'); // Store a new client
    Route::get('/{id}', [ClientController::class, 'show'])->name('backend.clients.show'); // Show a single client
    Route::get('/{id}/edit', [ClientController::class, 'edit'])->name('backend.clients.edit'); // Show form to edit a client
    Route::put('/{id}', [ClientController::class, 'update'])->name('backend.clients.update'); // Update a client
    Route::delete('/{id}', [ClientController::class, 'destroy'])->name('backend.clients.destroy'); // Delete a client
});


//Backend Visitor Message Routes
Route::prefix('admin/contact-messages')->group(function () {
    Route::get('/', [ContactusMessageController::class, 'index'])->name('backend.contact-messages.index'); // List all messages
    Route::get('/{id}', [ContactusMessageController::class, 'show'])->name('backend.contact-messages.show'); // Show a single message
    Route::delete('/{id}', [ContactusMessageController::class, 'destroy'])->name('backend.contact-messages.destroy'); // Delete a message
});

//Backend Project Routes
Route::prefix('admin/projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('backend.projects.index'); // List all projects
    Route::get('/create', [ProjectController::class, 'create'])->name('backend.projects.create'); // Show form to create a new project
    Route::post('/', [ProjectController::class, 'store'])->name('backend.projects.store'); // Store a new project
    Route::get('/{id}', [ProjectController::class, 'show'])->name('backend.projects.show'); // Show a single project
    Route::get('/{id}/edit', [ProjectController::class, 'edit'])->name('backend.projects.edit'); // Show form to edit a project
    Route::put('/{id}', [ProjectController::class, 'update'])->name('backend.projects.update'); // Update a project
    Route::delete('/{id}', [ProjectController::class, 'destroy'])->name('backend.projects.destroy'); // Delete a project
});

Route::prefix('admin/user-profile')->middleware('auth')->group(function () {
    Route::get('/', [UserProfileController::class, 'show'])->name('backend.user-profile.show'); // Show user profile
    Route::get('/edit', [UserProfileController::class, 'edit'])->name('backend.user-profile.edit'); // Edit user profile form
    Route::put('/', [UserProfileController::class, 'update'])->name('backend.user-profile.update'); // Update user profile
    Route::get('/change-password', [UserProfileController::class, 'changePassword'])->name('backend.user-profile.change-password'); // Change password
    Route::post('/update-password', [UserProfileController::class, 'updatePassword'])->name('backend.user-profile.update-password'); // Change password
    Route::get('/logout', [UserProfileController::class, 'userlogout'])->name('admin.logout');
});


Route::prefix('admin/users')->middleware('auth', 'is_admin')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index'); // List all users
    Route::get('/create', [UserController::class, 'create'])->name('users.create'); // Show form to create a new user
    Route::post('/', [UserController::class, 'store'])->name('users.store'); // Store a new user
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // Show form to edit a user
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update'); // Update user details
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Delete a user
});

});
