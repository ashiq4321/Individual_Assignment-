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
Route::get('/system/supportstaff/login', 'LoginController@index');
Route::post('/system/supportstaff/login', 'LoginController@verify');
Route::get('/logout', 'logoutController@index');
Route::resource('busmanager', 'BusmangerController');
Route::resource('admin', 'AdminController');