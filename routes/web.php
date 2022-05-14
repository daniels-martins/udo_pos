<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchContoller;
use App\Http\Controllers\TinkerController;

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


// all views extend the dashboard.blade.php

// widgets
Route::view('admin/widgets', 'admin.widgets')->name('widgets');

// dashboard/homepage for shop owners
Route::view('admin/dashboard', 'admin.dashboard_main')->name('admin.dashboard')->middleware('auth');

// dashboard/homepage for employees
Route::view('employee/dashboard', 'emp_views/dashboard2')->name('employee.dashboard')->middleware('auth.emp');

// laravel default dashboard
Route::view('dashboard', 'dashboard0')->name('dashboard')->middleware('auth.emp');

// pos route 
Route::view('pos', 'admin/pos')->name('pos')->middleware('auth');


Route::get('suggest', [SearchContoller::class, 'faster'])->name('search.index');
Route::get('tinker', [TinkerController::class, 'try'])->name('tinker');


// Cart controllers (special)
Route::middleware('auth')->group(function () {
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart', [CartController::class, 'store'])->name('cart.store');
    Route::patch('cart/{row_id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{row_id}', [CartController::class, 'destroy'])->name('cart.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/auth_employees.php';

