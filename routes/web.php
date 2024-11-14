<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProductController as AdminProductController,
    CategoryProductController as AdminCategoryProductController,
    UserController as AdminUserController,
    TransactionController as AdminTransactionController,
    BrandController as AdminBrandController,
    AdminController
};

// Route::get('/', function () {
//     return view('welcome');
// });

Route::name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'indexDashboard'])->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('product-categories', AdminCategoryProductController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('transactions', AdminTransactionController::class);
    Route::resource('brands', AdminBrandController::class);
});

Route::name('data-table.')->prefix('data-table')->group(function() {
    Route::get('/brand', [AdminBrandController::class, 'dataTable'])->name('brand');
    Route::get('/category', [AdminCategoryProductController::class, 'dataTable'])->name('category');
    Route::get('/transaction', [AdminTransactionController::class, 'dataTable'])->name('transaction');
    Route::get('/user', [AdminUserController::class, 'dataTable'])->name('user');
    Route::get('/product', [AdminProductController::class, 'dataTable'])->name('product');
});