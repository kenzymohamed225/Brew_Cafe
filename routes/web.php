<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/menu', function () { return view('menu'); })->name('menu');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact_us'); })->name('contact');

// Gallery Public Routes
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Gallery Admin Routes
Route::prefix('admin/gallery')->name('admin.gallery.')->group(function () {
    Route::get('/', [GalleryController::class, 'adminIndex'])->name('index');
    Route::get('/create', [GalleryController::class, 'create'])->name('create');
    Route::post('/', [GalleryController::class, 'store'])->name('store');
    Route::get('/{gallery}/edit', [GalleryController::class, 'edit'])->name('edit');
    Route::put('/{gallery}', [GalleryController::class, 'update'])->name('update');
    Route::delete('/{gallery}', [GalleryController::class, 'destroy'])->name('destroy');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/cart', function () { return view('cart'); })->name('cart');
    Route::get('/add-product', function () { return view('add_product'); })->name('product.add');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');