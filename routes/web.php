<?php

use App\Models\Gallery;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OrganizationController;

// 1. Halaman Beranda (Home)
Route::get('/', [HomeController::class, 'index']); 

// 2. Halaman Galeri
Route::get('/galeri', function () {
    $galleries = Gallery::latest()->get();
    return view('welcome', compact('galleries'));
});

// 3. Halaman Tentang Kami
Route::get('/tentang-fmiunnes', [AboutController::class, 'index'])->name('about');

Route::get('/struktur', [OrganizationController::class, 'index'])->name('struktur.index');

Route::get('/seed-setting', function () {
    \App\Models\Setting::updateOrCreate(
        ['key' => 'org_title'], 
        ['value' => 'Kepengurusan FMI 2024']
    );
    return "Data berhasil dimasukkan!";
});

// 4. Halaman Kontak
Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');

Route::post('/contact-send', [ContactController::class, 'store'])->name('contact.send');

