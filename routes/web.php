<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchContoller;
use App\Http\Controllers\TinkerController;
use App\Http\Controllers\InvoiceController;
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

// landing page
Route::get('/', function () {
    return view('welcome');
})->name('landingpage');

// should in case u decide to use profiles
// Route::post('profile/update', [ProfileController::class, 'update'])->name('profiles.update')->middleware('auth');

// invoice routes
Route::view('invoice-default', 'invoice')->name('invoice');
Route::view('widgets', 'widgets')->name('widgets');
Route::view('invoice-print', 'invoice-print')->name('invoice-print');
// laraveldaily invoice
Route::get('invoice', [InvoiceController::class, 'index']);

// all views extend the dashboard.blade.php

// dashboard/homepage for shop owners
Route::view('dashboard', 'dashboard_main')->name('dashboard')->middleware('auth');

// dashboard/homepage for employees
Route::view('dashboard2', 'emp_views/dashboard2')->name('emp.dashboard')->middleware('auth.emp');



// pos route 
Route::view('pos', 'pos')->name('pos')->middleware('auth');


Route::get('suggest', [SearchContoller::class, 'faster'])->name('search.index');
Route::get('tinker', [TinkerController::class, 'try'])->name('tinker');

// ===============password change routes===============
// view the password reset page  
Route::view('change-password', 'change_password')->name('password.edit');
// modify the password in the db
Route::post('change-password', [ModifyPassword::class, 'modify'])->name('password.modify');


// Cart controllers (special)
Route::middleware('auth')->group(function () {
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart', [CartController::class, 'store'])->name('cart.store');
    Route::patch('cart/{row_id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{row_id}', [CartController::class, 'destroy'])->name('cart.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/auth_employees.php';
