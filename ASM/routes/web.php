<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

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

Route::resource('products', ProductController::class);
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth');
Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);
Route::resource('customers', CustomerController::class);
Route::resources([
    'products' => ProductController::class,
]);

Route::get('login', [AuthenticateController::class, 'loginIndex'])->name('login');
Route::post('login', [AuthenticateController::class, 'login']);

Route::get('register', [AuthenticateController::class, 'registerIndex'])->name('register');
Route::post('register', [AuthenticateController::class, 'register']);

Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');
