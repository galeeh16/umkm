<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAuthMiddleware;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\ProductController as DashboardProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(CheckAuthMiddleware::class)->group(function() {
    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    // profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/product', [ProfileController::class, 'product'])->name('profile.product');

    // dashboard - product
    Route::get('/dashboard/products', [DashboardProductController::class, 'index'])->name('dashboard.product');
    Route::post('/dashboard/products/list', [DashboardProductController::class, 'list'])->name('dashboard.product.list');
    Route::get('/dashboard/products/create', [DashboardProductController::class, 'create'])->name('dashboard.product.create');
    Route::post('/dashboard/products/create', [DashboardProductController::class, 'store'])->name('dashboard.product.store');
    Route::get('/dashboard/products/edit/{id}', [DashboardProductController::class, 'edit'])->name('dashboard.product.edit');
    Route::post('/dashboard/products/update/{id}', [DashboardProductController::class, 'update'])->name('dashboard.product.update');
});
