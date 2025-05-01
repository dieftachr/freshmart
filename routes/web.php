<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// root dengan mode resources
Route::resource('/products', ProdukController::class);
Route::get('/', function () {
    return view('user/index');
});

// root dengan mode resources

Route::get('user', [UserController::class, 'index']);