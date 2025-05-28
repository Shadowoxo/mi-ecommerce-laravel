<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas de la tienda pública
Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');

// Rutas del carrito público (ShopController)
Route::get('/add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('shop.addToCart');
Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
Route::get('/remove-from-cart/{id}', [ShopController::class, 'removeFromCart'])->name('shop.removeFromCart');
Route::post('/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');
Route::get('/success', [ShopController::class, 'success'])->name('shop.success');

// Rutas del carrito con CartController (si necesitas manejarlo por separado)
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

// Rutas de checkout con CheckoutController
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

// Rutas de autenticación y perfil, solo para usuarios autenticados
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para administradores con middleware CheckRole
Route::middleware(['auth', CheckRole::class . ':admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('products', AdminProductController::class);
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    });

require __DIR__.'/auth.php';
