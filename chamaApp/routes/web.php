<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/subscribe/{type}','App\Http\Controllers\SubscriptionController@index');

// Route::get('/users', 'App\Http\Controllers\SubscriptionController@index');
Route::get('change-password', 'App\Http\Controllers\ChangePasswordController@index');
Route::post('change-password', 'App\Http\Controllers\ChangePasswordController@store')->name('change.password');
//Route::get('deposit_amount', 'App\Http\Controllers\TransactonController@index');
Route::resource('transact', 'App\Http\Controllers\TransactonController');
Route::resource('withdraw', 'App\Http\Controllers\WidhdrawController');
Route::resource('loan', 'App\Http\Controllers\LoanController');
Route::resource('/repay_loan', 'App\Http\Controllers\RepayLoanController');
Route::resource('/master', 'App\Http\Controllers\MasterController');


// Route::get('/repay_loan', [App\Http\Controllers\LoanController::class, 'repay_loan']);
// Route::get('/withdraw', [App\Http\Controllers\TransactonController::class, 'withdraw']);
// Route::get('/withdraw', [App\Http\Controllers\TransactonController::class, 'withdrawamount']);


//Route::get('loan/repay_loan', 'App\Http\Controllers\LoanController@repay_loan');
