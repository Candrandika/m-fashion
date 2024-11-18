<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProductController as AdminProductController,
    ProductDetailController as AdminProductDetailController,
    CategoryProductController as AdminCategoryProductController,
    UserController as AdminUserController,
    TransactionController as AdminTransactionController,
    BrandController as AdminBrandController,
    AdminController
};

// Route::get('/', function () {
//     return view('welcome');
// });

Route::name('auth.')->group(function() {
    Route::get('/', function() {
        return view('pages.auth.index');
    })->name('home');
    Route::get('/login', function() {
        return view('pages.auth.login');
    });
    Route::get('/register', function() {
        return view('pages.auth.register');
    });
    Route::get('/login-success', function() {
        return view('pages.auth.login-success');
    });
    Route::get('/register-success', function() {
        return view('pages.auth.register-success');
    });
});

Route::name('main')->group(function() {
    Route::get('home', function() {
        return view('pages.main.home.index');
    });
});

Route::name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'indexDashboard'])->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('product-details', AdminProductDetailController::class);
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
    Route::get('/product-detail', [AdminProductDetailController::class, 'dataTable'])->name('product-detail');
});