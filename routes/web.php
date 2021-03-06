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
Route::patch('/system/buses/{id}/edit', 'AdminController@updatebusinfo')->name('update.bus');
Route::get('/system/buses/{id}/edit', 'AdminController@busEdit')->middleware('sess','areYouAdmin');
Route::post('/system/buses/add', 'AdminController@busAdded');
Route::get('/system/buses/add', 'AdminController@busAdd')->name('add.bus')->middleware('sess','areYouAdmin');
Route::get('/system/buses', 'AdminController@buslist')->name('buses.list')->middleware('sess','areYouAdmin');
Route::get('/system/supportstaff/add', 'AdminController@busManagerAdd')->name('admin.addmanager')->middleware('sess','areYouAdmin');
Route::post('/system/supportstaff/add', 'AdminController@busManagerAdded');
Route::post('/system/buscounter/add', 'BusmangerController@busCounterAdded');
Route::get('/system/buscounter', 'BusmangerController@busCounterlist')->name('buscounter.list')->middleware('sess','areYouManager');
Route::get('/system/buscounter/add', 'BusmangerController@busCounterAdd')->name('buscounter.add')->middleware('sess','areYouManager');
Route::get('/system/supportstaff', 'AdminController@busManagerlist')->name('busmanager.list')->middleware('sess','areYouAdmin');
Route::get('/system/busmanager', 'AdminController@busManagerlist')->name('busmanager.list')->middleware('sess','areYouAdmin');
Route::get('/system/busmanager/{id}/delete', 'AdminController@deletebusmanager')->name('busmanager.delete')->middleware('sess','areYouAdmin');
Route::get('/system/busmanager/ajax/search', 'AdminController@busManagerSearch')->name('busmanager.search')->middleware('sess','areYouAdmin');
Route::get('/system/supportstaff/login', 'LoginController@index')->name('login.index');
Route::post('/system/supportstaff/login', 'LoginController@verify');
Route::get('/logout', 'logoutController@index');
Route::resource('register', 'RegisterController');
Route::resource('busmanager', 'BusmangerController');
Route::resource('admin', 'AdminController');