<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MidtransController;

Route::post('/midtrans/callback', [MidtransController::class, 'callback'])->name('midtrans.notification');
