<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AlatController;

// Route untuk Kategori (Bisa diatur proteksinya nanti, sementara public/bebas dulu atau langsung API Resource)
Route::apiResource('kategori', KategoriController::class);

// Route untuk Alat
Route::apiResource('alat', AlatController::class);