<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CategoryController;

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
    //Products:
    Route::get('/admin/products', [ProductController::class, 'index'])->name('adminProducts.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('adminProducts.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('adminProducts.store');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('adminProducts.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('adminProducts.update');
    Route::get('/admin/products/{id}', [ProductController::class, 'destroy'])->name('adminProducts.destroy');
    //Employees:
    Route::get('/admin/employees', [EmployeeController::class, 'index'])->name('adminEmployees.index');
    Route::get('/admin/employees/create', [EmployeeController::class, 'create'])->name('adminEmployees.create');    
    Route::post('/admin/employees', [EmployeeController::class, 'store'])->name('adminEmployees.store');
    Route::get('/admin/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('adminEmployees.edit');
    Route::put('/admin/employees/{id}', [EmployeeController::class, 'update'])->name('adminEmployees.update');
    Route::get('/admin/employees/{id}', [EmployeeController::class, 'destroy'])->name('adminEmployees.destroy');
    //Catogories
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('adminCategories.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('adminCategories.create');    
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('adminCategories.store');
    Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->name('adminCategories.edit');
    Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('adminCategories.update');
    Route::get('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('adminCategories.destroy');
});



require __DIR__.'/auth.php';

//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);