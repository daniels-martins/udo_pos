<?php

use App\Http\Controllers\ModifyPasswordController as ModifyPassword;
use Illuminate\Support\Facades\Route;

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

// Route::view('/dashboard', 'dashboard')->middleware(['auth'])->name('dashboard');

Route::view('invoice', 'invoice')->name('invoice');
Route::view('widgets', 'widgets')->name('widgets');
Route::view('invoice-print', 'invoice-print')->name('invoice-print');

Route::view('dashboard', 'dashboard')->name('dashboard')->middleware('auth');
Route::view('profile', 'profile')->name('profile')->middleware('auth');

Route::get('pos', function(){
    return view('pos');
})->name('pos');
// password change routes
// view the password reset page
Route::view('change-password', 'change_password')->name('password.edit');
// modify the password in the db
Route::post('change-password', [ModifyPassword::class, 'modify'])->name('password.modify');
require __DIR__ . '/auth.php';