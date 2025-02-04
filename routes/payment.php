<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;


Route::get('{curso}/checkout', [PaymentController::class, 'checkout'])->name('checkout');

Route::get('{curso}/pay', [PaymentController::class, 'pay'])->name('pay');

Route::get('{curso}/approved', [PaymentController::class, 'approved'])->name('approved');