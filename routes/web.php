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
Route::get('/system',function () {
    return view('system.index');
});
Route::get('/system/supportstaff/add', 'AdminController@busManagerAdd');
Route::post('/system/supportstaff/add', 'AdminController@busManagerAdded');
Route::get('/system/buscounter', 'BusmangerController@busCounterlist')->name('buscounter.list')->middleware('sess','areYouAdmin');
Route::get('/system/supportstaff', 'AdminController@busManagerlist')->name('busmanager.list')->middleware('sess','areYouAdmin');
Route::get('/system/busmanager', 'AdminController@busManagerlist')->name('busmanager.list')->middleware('sess','areYouAdmin');
Route::get('/system/busmanager/{id}/delete', 'AdminController@deletebusmanager')->name('busmanager.delete');
Route::get('/system/supportstaff/login', 'LoginController@index')->name('login.index');
Route::post('/system/supportstaff/login', 'LoginController@verify');
Route::get('/logout', 'logoutController@index');
Route::resource('register', 'RegisterController');
Route::resource('busmanager', 'BusmangerController');
Route::resource('admin', 'AdminController');