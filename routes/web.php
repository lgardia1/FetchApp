<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('fetch', function () {
    return view('fetch');
});

Route::resource('product', ProductController::class);
