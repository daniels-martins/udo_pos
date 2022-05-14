<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StoreWarehouseController;
use App\Http\Controllers\MeasurementScaleController;

Route::prefix('/emp')->name('emp.')->group(function () {
    
        // potential future employee routes
    // Product and product related routes for employees NB: its the same controllers used by owners
    Route::resources([
        'products' => ProductController::class, //CR U=>except('price') D=>(mark items for deletion & 4wd 2 admin 2 approve) 
        // ScamPotential: wicked emps can long the price and after sale, they short the price, so as to make profit.
        // we'll leave this for now, but later we'll work on the security
        'categories' => CategoryController::class, //CRU D=>(mark items for deletion & 4wd 2 admin 2 approve) 
        'customers' => InvoiceController::class, //CR 
        // U=>except('isDebt', emps don't know if and how much a customer owes, they only have an outstanding order to sell 
        // to such persons) D=>(mark customers for deletion & 4wd 2 admin 2 approve) 
        'orders' => CustomerController::class, //? CR |!UD=> so that they won't delete an order in the DB and collect the money
        // paid by customer 
        'scales' => MeasurementScaleController::class, //CRUD 
        'invoices' => CustomerController::class, //CR|!UD
        'profiles' => ProfileController::class, //RU| !CD
        'stores' => StoreWarehouseController::class, // READ_ONLY (PERTINENT OR RELATED STORE, ie. stores where they work)
        'employees' => EmployeeController::class, // READ_ONLY (PERTINENT OR RELATED STORE, ie. stores where they work) 
        // in future, READ_ONLY access to employees in other stores owned by their Bosses
    ], [
        // 'middleware' => 'auth.emp' //
    ]);

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


});
