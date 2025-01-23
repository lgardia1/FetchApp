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

Auth::routes();

Route::get('fetch', function () {
    return view('fetch');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
