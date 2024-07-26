<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//
Route::prefix('admin')->middleware(App\Http\Middleware\AdminMiddleware::class)->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/products', [ProductController::class, 'create'])->name('products.admin.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.admin.srore');

});
require __DIR__.'/auth.php';
