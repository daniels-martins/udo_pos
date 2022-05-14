<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StoreWarehouseController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\MeasurementScaleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\ModifyPasswordController as ModifyPassword;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Any Auth(Hybrid Auth) Routes
|--------------------------------------------------------------------------
| Route for all authenticated users ie. boss and employee
*/
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')->middleware('auth.any');

/*
|--------------------------------------------------------------------------
| Auth Routes for  BizOwners (Bosses)
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('admin/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('admin/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // ===============password confirmation routes===============
    Route::get('admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('admin/confirm-password', [ConfirmablePasswordController::class, 'store']);

    // ===============password change routes===============
    Route::view('change-password', 'admin.password.change_password')->name('password.edit');
    // modify the password in the db
    Route::post('change-password', [ModifyPassword::class, 'modify'])->name('password.modify');


    // webapplicaton routes
    Route::resources([
        'users' => UserController::class, // i am the only one that has access to this route
        'products' => ProductController::class,
        'profiles' => ProfileController::class,
        'employees' => EmployeeController::class,
        'categories' => CategoryController::class,
        'customers' =>  CustomerController::class,
        'invoices' => InvoiceController::class,
        'orders' => OrderController::class,
        'scales' => MeasurementScaleController::class,
        'stores' => StoreWarehouseController::class,
        // this is singular because you can only create one company per user
        // multiple companies have to be registered under a different user_id
        'firms' => FirmController::class,
    ]);

    
    //special invoice routes
Route::view('invoice-default', 'admin.invoices.invoice')->name('invoice');
Route::view('invoice-print', 'admin.invoices.invoice-print')->name('invoice-print');


});
