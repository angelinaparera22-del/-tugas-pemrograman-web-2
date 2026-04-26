<?php

use App\Http\Controllers\SepatuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SepatuController::class, 'index']);


Route::get('/produk-sepatu', [SepatuController::class, 'index'])->name('produk-sepatu.index');
Route::get('/produk-sepatu/create', [SepatuController::class, 'create'])->name('produk-sepatu.create');
Route::post('/produk-sepatu', [SepatuController::class, 'store'])->name('produk-sepatu.store');
Route::get('/produk-sepatu/{sepatu}/edit', [SepatuController::class, 'edit'])->name('produk-sepatu.edit');
Route::put('/produk-sepatu/{sepatu}', [SepatuController::class, 'update'])->name('produk-sepatu.update');
Route::delete('/produk-sepatu/{sepatu}', [SepatuController::class, 'destroy'])->name('produk-sepatu.destroy');