<?php

use App\Http\Controllers\SepatuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [SepatuController::class, 'index']);

Route::get('/produk-sepatu', [SepatuController::class, 'index'])->name('produk-sepatu.index');
Route::get('/produk-sepatu/create', [SepatuController::class, 'create'])->name('produk-sepatu.create');
Route::post('/produk-sepatu/store', [SepatuController::class, 'store'])->name('produk-sepatu.store');

