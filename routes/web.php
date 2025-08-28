<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForm');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('registerForm');
    // Add other auth routes like register, logout, etc.
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
});

Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::patch('/restore/{id}', [CategoryController::class, 'restore'])->name('restore');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::patch('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/soft/{id}', [CategoryController::class, 'softDelete'])->name('softDelete');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
});
