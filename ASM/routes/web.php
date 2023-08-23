<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardController;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\FrontendController;
Paginator::useBootstrap();


Route::get('/', function () {
    return view('login');
});
Route::get('/frontend', [FrontendController::class, 'index']);
Route::resource('frontend', FrontendController::class);




Route::resource('products', ProductController::class);
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth');
Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);
Route::resource('customers', CustomerController::class);
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/frontend', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/product-detail/{id}', [FrontendController::class, 'productDetail'])->name('frontend.product-detail');
Route::get('/theshowroom', [FrontendController::class, 'showRoom'])->name('frontend.showroom');

Route::resources([
    'products' => ProductController::class,
]);
Route::middleware(['auth', 'admin'])->group(function () {
    // Các route dành cho admin
    Route::get('/admin/dashboard', [ProductController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/dashboard', [ProductController::class, 'index'])->name('admin.dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('categories', CategoryController::class);
});

// Route::middleware(['auth', 'customer'])->group(function () {
//     // Các route dành cho customer
//     Route::get('/frontend', [FrontendController::class, 'index'])->name('frontend.index');
//     Route::get('/product-detail/{id}', [FrontendController::class, 'productDetail'])->name('frontend.product-detail');
//     Route::get('/theshowroom', [FrontendController::class, 'showRoom'])->name('frontend.showroom');
// });


Route::get('login', [AuthenticateController::class, 'loginIndex'])->name('login');
Route::post('login', [AuthenticateController::class, 'login']);

Route::get('register', [AuthenticateController::class, 'registerIndex'])->name('register');
Route::post('register', [AuthenticateController::class, 'register']);

Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');
