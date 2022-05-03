<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MeasurementScaleController;

Route::prefix('/emp')->name('emp.')->group(function () {
    // Auth controllers //SOON TO BE DELETED
    // Route::controller(EmployeeLoginController::class)->group(function () {
    //     //All the employee routes will be defined here...
    //     //Login Routes
    //     Route::get('/login', 'index')->name('login.index');
    //     Route::post('/login', 'login')->name('login');
    //     Route::post('/logout', 'logout')->name('logout');
    // });

    // FUTURE
    Route::controller(EmployeeForgotPasswordController::class)->group(function () {
        //   Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        //   Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    });

    // FUTURE
    Route::controller(EmployeeResetPasswordController::class)->group(function () {
        // Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        //   Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    });

    // potential future employee routes
    // Product and product related routes for employees NB: its the same controllers used by owners
    Route::resources([
        'products' => ProductController::class, //CRUD 
        'categories' => CategoryController::class, //CRUD
        'customers' => InvoiceController::class, //CRUD
        'orders' => CustomerController::class, //CRUD
        'scales' => MeasurementScaleController::class, //CRUD
        // 'invoices' => CustomerController::class, //CRUD
        // 'profiles' => ProfileController::class, //RU
        // 'stores' => StoreWarehouseController::class, // READ_ONLY (PERTINENT STORE)
        // 'employees' => EmployeeController::class,
    ], [
        // 'middleware' => 'auth.emp' //
    ]);
});
