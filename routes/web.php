<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\NewsController as UserNewsController;
use App\Http\Controllers\User\CommentController;
use App\Models\Category;
use App\Models\News;

// Home route
Route::redirect('/', '/news');

// Error page route
Route::get('/error', function () {
    return view('errors.error');
})->name('error.page');

// Guest routes (login/register)
Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);  
});

// Profile page
Route::get('/profile', [AuthController::class, 'profile'])
    ->middleware('auth')
    ->name('user.profile');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// User news routes
Route::get('/news', [UserNewsController::class, 'index'])->name('user.news.index');
Route::get('/news/{id}', [UserNewsController::class, 'show'])->name('user.news.show');

// Comment routes
Route::post('/news/{id}/comment', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('user.news.comment');

Route::delete('/comment/{id}', [CommentController::class, 'destroy'])
    ->middleware('auth')
    ->name('user.comment.destroy');

// Admin routes
Route::prefix('admin')->middleware(['auth', IsAdmin::class])->group(function () {

    // News CRUD
    Route::get('/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
    Route::get('/news/add', [AdminNewsController::class, 'create'])->name('admin.news.create');
    Route::post('/news', [AdminNewsController::class, 'store'])->name('admin.news.store');
    Route::get('/news/edit/{id}', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/news/{id}', [AdminNewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/news/{id}', [AdminNewsController::class, 'destroy'])->name('admin.news.destroy');

    // Category CRUD
    Route::get('category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    // Users CRUD
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/users', [UserController::class, 'index'])->name('admin.users.destroy');
    // Route::get('/news/add', [AdminNewsController::class, 'create'])->name('admin.news.create');
    // Route::resource('users', UserController::class)->only(['index', 'destroy']);
});
