
<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/menu', [ProductController::class, 'index'])->name('menu');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/add/{id}', [CartController::class, 'add'])
    ->name('cart.add');

Route::post('/cart/increase/{id}', [CartController::class, 'increase'])
    ->name('cart.increase');

Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])
    ->name('cart.decrease');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::middleware('auth')->group(function () {

    Route::get('/add_product', [ProductController::class, 'create'])
        ->name('product.add');

    Route::post('/add_product', [ProductController::class, 'store'])
        ->name('product.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Gallery Public Routes
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Gallery Admin Routes
Route::prefix('admin/gallery')->name('admin.gallery.')->middleware('auth')->group(function () {
    Route::get('/', [GalleryController::class, 'adminIndex'])->name('index');
    Route::get('/create', [GalleryController::class, 'create'])->name('create');
    Route::post('/', [GalleryController::class, 'store'])->name('store');
    Route::get('/{gallery}/edit', [GalleryController::class, 'edit'])->name('edit');
    Route::put('/{gallery}', [GalleryController::class, 'update'])->name('update');
    Route::delete('/{gallery}', [GalleryController::class, 'destroy'])->name('destroy');
});
