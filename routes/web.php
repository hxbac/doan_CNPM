<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Client\PostController as ClientPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Client\ContactController;
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


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::prefix('admin')->middleware('auth.admin')->group(function () {
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
    Route::prefix('/category')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/update', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });
    Route::prefix('/user')->group(function () {
        Route::get('/index', [AdminUserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [AdminUserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/update', [AdminUserController::class, 'update'])->name('admin.user.update');
        Route::get('/delete/{id}', [AdminUserController::class, 'delete'])->name('admin.user.delete');
    });
    Route::prefix('/post')->group(function () {
        Route::get('/index', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/store', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::post('/update', [PostController::class, 'update'])->name('admin.post.update');
        Route::get('/delete/{id}', [PostController::class, 'delete'])->name('admin.post.delete');
    });
    Route::prefix('/contact')->group(function () {
        Route::get('/index', [AdminContactController::class, 'index'])->name('admin.contact.index');
    });
    Route::prefix('/order')->group(function() {
        Route::get('/', [AdminOrderController::class, 'index'])->name('admin.order.index');
        Route::get('/detail/{id}', [AdminOrderController::class, 'detail'])->name('admin.order.detail');
        Route::get('/accept/{id}', [AdminOrderController::class, 'accept'])->name('admin.order.accept');
        Route::get('/cancel/{id}', [AdminOrderController::class, 'cancel'])->name('admin.order.cancel');
        Route::get('/success/{id}', [AdminOrderController::class, 'success'])->name('admin.order.success');
    });
    Route::prefix('/config')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('admin.config.index');
        Route::post('/slide', [ConfigController::class, 'slide'])->name('admin.config.slide');
        Route::post('/banner', [ConfigController::class, 'banner'])->name('admin.config.banner');
    });
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::prefix('/shop')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/{slug}/{id}', [ShopController::class, 'detail'])->name('shop.detail');
});

Route::prefix('/cart')->middleware('auth')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/remove/{productID}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::prefix('/checkout')->middleware('auth')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/order', [CheckoutController::class, 'order'])->name('checkout.order');
});

Route:: prefix('/my')->middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/{id}', [OrderController::class, 'detail'])->name('order.detail');
    Route::get('/order/cancel/{id}', [OrderController::class, 'cancel'])->name('order.cancel');
});
Route::prefix('/post')->group(function () {
    Route::get('/', [ClientPostController::class, 'index'])->name('post.index');
    Route::get('/{id}', [ClientPostController::class, 'detail'])->name('post.detail');
});

Route::prefix('/contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/', [ContactController::class, 'store'])->name('contact.store');
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
