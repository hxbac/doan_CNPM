<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::prefix('admin')->group(function () {
    Route::get('/index', [AdminHomeController::class, 'index'])->name('admin.home.index');
    Route::prefix('/menu')->group(function () {
        Route::get('/index', [MenuController::class, 'index'])->name('admin.menu.index');
        Route::get('/create', [MenuController::class, 'create'])->name('admin.menu.create');
        Route::post('/store', [MenuController::class, 'store'])->name('admin.menu.store');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('admin.menu.edit');
        Route::post('/update', [MenuController::class, 'update'])->name('admin.menu.update');
        Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('admin.menu.delete');
    });
    Route::prefix('/product')->group(function () {
        Route::get('/index', [ProductController::class,'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class,'create'])->name('admin.product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    });
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
