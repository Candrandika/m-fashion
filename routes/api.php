<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('callback-midtrans', [AdminTransactionController::class, 'callback'])->name('callback.midtrans');
