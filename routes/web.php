<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// root dengan mode resources
Route::resource('/products', ProdukController::class);
Route::get('/', function () {
    return view('user/index');
});
Route::get('products', [ProdukController::class, 'index'])->name('products.index');


// root dengan mode resources

Route::get('/', [UserController::class, 'index']);

//belum ke controller
Route::get('pages/login', function() {
    return view('pages/login');
});

Route::get('pages/register', function() {
    return view('pages/register');
});

