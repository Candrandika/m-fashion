<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProductController as AdminProductController,
    ProductDetailController as AdminProductDetailController,
    CategoryProductController as AdminCategoryProductController,
    UserController as AdminUserController,
    TransactionController as AdminTransactionController,
    BrandController as AdminBrandController,
    WarnaController as AdminWarnaController,
    SizeController as AdminSizeController,
    DiscountController as AdminDiscountController,
    AdminController
};
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionHistoryController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('info', function () {
    return phpinfo();
});



Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('pages.auth.login');
    })->name('login');

    Route::name('auth.')->group(function () {
        // Route::get('/', function () {
        //     return view('pages.auth.index');
        // })->name('home');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::get('/register', function () {
            return view('pages.auth.register');
        });
        Route::post('register', [AuthController::class, 'register'])->name('register');
        Route::get('/register-success', function () {
            return view('pages.auth.register-success');
        })->name('register.success');
    });
});


Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::post('callback-midtrans', [AdminTransactionController::class, 'callback'])->name('callback.midtrans');

Route::middleware('auth')->group(function () {
    Route::get('data-dashboard', [AdminController::class, 'dataDashboard'])->name('data.dashboard');

    Route::get('/login-success', function () {
        $user = Auth::user();
        return view('pages.auth.login-success', compact('user'));
    })->name('login.success');

    Route::name('main')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::middleware('role:user')->group(function (){
        Route::get('checkout', [AdminTransactionController::class, 'create'])->name('display.checkout');
        Route::resource('products', ProductController::class)->only(['index', 'show']);
        Route::resource('categories', CategoryController::class)->only(['show']);
        Route::resource('favorites', FavoriteController::class)->only(['index', 'store', 'destroy']);
        Route::resource('carts', CartController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('transactions', AdminTransactionController::class)->only(['store', 'destroy']);
        Route::post('checkout', [CartController::class, 'checkout'])->name('checkout');
        Route::post('callback', [AdminTransactionController::class, 'callback'])->name('callback');

        Route::get('transaction-history', [TransactionHistoryController::class, 'index'])->name('transaction-history');
        Route::get('transaction-history/{id}', [TransactionHistoryController::class, 'show'])->name('transaction-history.detail');
        Route::put('transaction-history/{id}', [TransactionHistoryController::class, 'update'])->name('transaction-history.update');
    });

    Route::middleware('role:admin')->group(function (){
        Route::name('admin.')->prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'indexDashboard'])->name('dashboard');
            Route::resource('products', AdminProductController::class);
            Route::resource('product-details', AdminProductDetailController::class);
            Route::post('product-images/{product}', [AdminProductDetailController::class, 'addImage'])->name('product_images');
            Route::delete('product-images/{product_image}', [AdminProductDetailController::class, 'deleteImage'])->name('product_images.destroy');
            Route::resource('product-categories', AdminCategoryProductController::class);
            Route::resource('users', AdminUserController::class);
            Route::resource('transactions', AdminTransactionController::class)->only(['index', 'update']);
            Route::resource('brands', AdminBrandController::class);
            Route::resource('colors', AdminWarnaController::class);
            Route::resource('sizes', AdminSizeController::class);
            Route::resource('discounts', AdminDiscountController::class);
        });

        Route::name('data-table.')->prefix('data-table')->group(function () {
            Route::get('/discount', [AdminDiscountController::class, 'dataTable'])->name('discount');
            Route::get('/brand', [AdminBrandController::class, 'dataTable'])->name('brand');
            Route::get('/color', [AdminWarnaController::class, 'dataTable'])->name('color');
            Route::get('/size', [AdminSizeController::class, 'dataTable'])->name('size');
            Route::get('/category', [AdminCategoryProductController::class, 'dataTable'])->name('category');
            Route::get('/transaction', [AdminTransactionController::class, 'dataTable'])->name('transaction');
            Route::get('/user', [AdminUserController::class, 'dataTable'])->name('user');
            Route::get('/product', [AdminProductController::class, 'dataTable'])->name('product');
            Route::get('/product-detail', [AdminProductDetailController::class, 'dataTable'])->name('product-detail');
        });
    });
});


Route::get('about', function () {
    return view('pages.main.about.index');
});
Route::get('csr', function () {
    return view('pages.main.csr.index');
});
Route::get('contact-us', function () {
    return view('pages.main.contact.index');
});
Route::get('location', function () {
    return view('pages.main.location.index');
});
