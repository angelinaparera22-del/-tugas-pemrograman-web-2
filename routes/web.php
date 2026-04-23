<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('produk-sepatu', function () {
    return view('produk-sepatu.index',['title' => 'Produk Sepatu']);
});

Route::get('produk-sepatu/create', function () {
    return view('produk-sepatu.create',['title' => 'Create Produk Sepatu']);
});
