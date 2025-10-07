<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\CategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
    return "Welcome, " . auth()->user()->username;
})->middleware('auth');


// Guest routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// admin routes
Route::prefix('admin')->middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('/news/add', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
});

// category routes
Route::prefix('admin')->middleware(['auth', IsAdmin::class])->name('admin.')->group(function () {
    // Category routes
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

});


