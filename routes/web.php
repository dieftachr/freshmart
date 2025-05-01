<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// root dengan mode resources
Route::resource('/products', ProdukController::class);
Route::get('/', function () {
    return view('index');
});

// root dengan mode resources

Route::get('/', [UserController::class, 'index']);
