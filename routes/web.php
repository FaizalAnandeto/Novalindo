<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'about'])->name('about');
Route::get('/layanan', [HomeController::class, 'services'])->name('services');
Route::get('/portofolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');

// Produk
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/kategori/{category:slug}', [ProductController::class, 'category'])->name('products.category');
Route::get('/produk/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// Pemesanan
Route::get('/pesan', [OrderController::class, 'create'])->name('order.create');
Route::post('/pesan', [OrderController::class, 'store'])->name('order.store');
Route::get('/pesan/sukses/{orderNumber}', [OrderController::class, 'success'])->name('order.success');

// Cek Pesanan
Route::get('/cek-pesanan', [OrderController::class, 'track'])->name('order.track');
Route::post('/cek-pesanan', [OrderController::class, 'trackSearch'])->name('order.track.search');
