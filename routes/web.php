<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
 
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('adminDashboard.index');
    
    Route::get('/admin/products', [ProductController::class, 'index'])->name('adminProducts.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('adminProducts.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('adminProducts.store');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('adminProducts.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('adminProducts.update');
    Route::get('/admin/products/delete/{id}', [ProductController::class, 'delete'])->name('admin/products/delete');
    
});



require __DIR__.'/auth.php';

//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);