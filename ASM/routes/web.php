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
    return view('dashboard');
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

Route::resources([
    'products' => ProductController::class,
]);

// Route group for admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::resource('products', ProductController::class); // Define resourceful routes for products
    Route::resource('categories', CategoryController::class); // Define resourceful routes for categories
    Route::resource('brands', BrandController::class); // Define resourceful routes for brands
});


Route::get('login', [AuthenticateController::class, 'loginIndex'])->name('login');
Route::post('login', [AuthenticateController::class, 'login']);

Route::get('register', [AuthenticateController::class, 'registerIndex'])->name('register');
Route::post('register', [AuthenticateController::class, 'register']);

Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');
