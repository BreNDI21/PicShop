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

Route::get('/', 'HomeController@index');
/*
 * |-----Resources-----|
 */
Route::resource('Home', 'HomeController');
/*
 * |-----AdminPanel-----|
 */
Route::resource('admin','AdminController');
Route::get('/admin','AdminController@index');
Route::get('/adminenter','AdminController@enter')->name('adminenter');
Route::get('/adminPanel','AdminController@adminPanel')->name('adminPanel');
