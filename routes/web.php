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
use App\Http\Controllers\StoreWarehouseController;
use App\Http\Controllers\MeasurementScaleController;
use App\Http\Controllers\Employee\EmployeeLoginController;
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
    'users' => UserController::class, // i am the only one that has access to this route
    'products' => ProductController::class,
    'profiles' => ProfileController::class,
    'employees' => EmployeeController::class,
    'categories' => CategoryController::class,
    'customers' => InvoiceController::class,
    // 'invoices' => CustomerController::class,
    'orders' => CustomerController::class,
    'scales' => MeasurementScaleController::class,
    'stores' => StoreWarehouseController::class,
], [
    'middleware' => 'auth'
]);

Route::view('invoice-default', 'invoice')->name('invoice');
Route::view('widgets', 'widgets')->name('widgets');
Route::view('invoice-print', 'invoice-print')->name('invoice-print');
Route::get('invoice', [InvoiceController::class, 'index']);

// Route::post('profile/update', [ProfileController::class, 'update'])->name('profiles.update')->middleware('auth');

Route::view('dashboard', 'dashboard_main')->name('dashboard')->middleware('auth');

Route::get('pos', function () {
    return view('pos');
})->name('pos')->middleware('auth');




Route::get('suggest', [SearchContoller::class, 'faster'])->name('search.index');
Route::get('tinker', [TinkerController::class, 'try'])->name('tinker');
// password change routes
// view the password reset page  
Route::view('change-password', 'change_password')->name('password.edit');
// modify the password in the db
Route::post('change-password', [ModifyPassword::class, 'modify'])->name('password.modify');
require __DIR__ . '/auth.php';

// Route::get('invoice');
// Cart controllers (special)
Route::middleware('auth')->group(function () {
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart', [CartController::class, 'store'])->name('cart.store');
    Route::patch('cart/{row_id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{row_id}', [CartController::class, 'destroy'])->name('cart.destroy');
});


Route::prefix('/emp')->name('emp.')->namespace('Employee')->group(function(){


    // Auth controllers
    Route::controller(EmployeeLoginController::class)->namespace('Auth')->group(function(){
    //All the employee routes will be defined here...
        //Login Routes
        Route::get('/login','show')->name('login.show');
        Route::post('/login','login')->name('login');
        Route::post('/logout','logout')->name('logout');

    });

    Route::controller(EmployeeForgotPasswordController::class)->namespace('Auth')->group(function(){
        //   Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        //   Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
      
        });

        Route::controller(EmployeeResetPasswordController::class)->namespace('Auth')->group(function(){
            // Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
            //   Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
            });
   
  });