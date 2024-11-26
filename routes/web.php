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
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('info', function () {
    return phpinfo();
});

Route::name('auth.')->group(function () {
    Route::get('/', function () {
        return view('pages.auth.index');
    })->name('home');
    Route::get('/login', function () {
        return view('pages.auth.login');
    })->name('view.login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', function () {
        return view('pages.auth.register');
    });
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('/register-success', function () {
        return view('pages.auth.register-success');
    })->name('register.success');
});

Route::name('main')->group(function () {
    Route::get('home', function () {
        return view('pages.main.home.index');
    });
    // Route::get('checkouts', function () {
    //     return view('pages.main.checkout.index');
    // });
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

// Route::middleware('auth')->group(function() {
Route::get('/login-success', function () {
    $user = Auth::user();
    return view('pages.auth.login-success', compact('user'));
})->name('login.success');
// });

Route::name('products.')->prefix('products')->group(function () {
    Route::get('/', function () {
        return view('pages.main.products.index');
    })->name('index');
    Route::get('{product}', function () {
        return view('pages.main.products.show');
    })->name('show');
});

Route::name('categories.')->prefix('categories')->group(function () {
    Route::get('/{category}', function () {
        return view('pages.main.categories.show');
    });
});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'indexDashboard'])->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('product-details', AdminProductDetailController::class);
    Route::resource('product-categories', AdminCategoryProductController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('transactions', AdminTransactionController::class);
    Route::resource('brands', AdminBrandController::class);
});

Route::name('data-table.')->prefix('data-table')->group(function () {
    Route::get('/brand', [AdminBrandController::class, 'dataTable'])->name('brand');
    Route::get('/category', [AdminCategoryProductController::class, 'dataTable'])->name('category');
    Route::get('/transaction', [AdminTransactionController::class, 'dataTable'])->name('transaction');
    Route::get('/user', [AdminUserController::class, 'dataTable'])->name('user');
    Route::get('/product', [AdminProductController::class, 'dataTable'])->name('product');
    Route::get('/product-detail', [AdminProductDetailController::class, 'dataTable'])->name('product-detail');
});
