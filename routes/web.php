<?php

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

Route::group(['middleware' => 'admin', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'HomeDashboardController@index')->name('dashboard.home');
    Route::resource('parks', 'ParkController');
    Route::resource('inverters', 'InverterController');
});
