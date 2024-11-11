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