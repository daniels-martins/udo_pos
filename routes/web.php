<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchContoller;
use App\Http\Controllers\TinkerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ModifyPasswordController as ModifyPassword;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 
Route::get('/', function () {
    return view('welcome');
});

// Product routes
Route::resources([
    'products' => ProductController::class,
    'users' => UserController::class,
    'profiles' => ProfileController::class,
    'employees' => EmployeeController::class,
    'categories' => CategoryController::class,
    'customers' => InvoiceController::class,
    // 'invoices' => CustomerController::class,
    'orders' => CustomerController::class,
], [
    'middleware' => 'auth'
]);
// Route::view('profile', 'profile')->name('profile')->middleware('auth');

Route::view('invoice-default', 'invoice')->name('invoice');
Route::view('widgets', 'widgets')->name('widgets');
Route::view('invoice-print', 'invoice-print')->name('invoice-print');
Route::get('invoice', [InvoiceController::class, 'index']);

// Route::post('profile/update', [ProfileController::class, 'update'])->name('profiles.update')->middleware('auth');

Route::view('dashboard', 'dashboard_main')->name('dashboard')->middleware('auth');

Route::get('pos', function () {
    return view('pos');
})->name('pos')->middleware('auth');


// Route::get('invoice');
// Cart controllers (special)
Route::get('cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::post('cart', [CartController::class, 'store'])->name('cart.store')->middleware('auth');
Route::patch('cart/{row_id}', [CartController::class, 'store'])->name('cart.update')->middleware('auth');
Route::delete('/cart/{row_id}', [CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');


Route::get('suggest', [SearchContoller::class, 'faster'])->name('search.index');
Route::get('tinker', [TinkerController::class, 'try'])->name('tinker');
// password change routes
// view the password reset page
Route::view('change-password', 'change_password')->name('password.edit');
// modify the password in the db
Route::post('change-password', [ModifyPassword::class, 'modify'])->name('password.modify');
require __DIR__ . '/auth.php';
