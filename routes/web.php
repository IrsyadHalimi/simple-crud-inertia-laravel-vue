<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

// Menampilkan daftar semua buku
Route::resource('books', BookController::class);
