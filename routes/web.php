<?php

use App\Http\Controllers\SepatuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/produk-sepatu', [SepatuController::class, 'index']);
Route::get('/produk-sepatu/create', [SepatuController::class, 'create']);
