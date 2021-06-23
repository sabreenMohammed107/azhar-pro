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


// admin routes
Route::group(['middleware' => 'is_admin'], function () {
    Route::get('admin/home', 'Admin\IndexController@index')->name('admin.home');

});

//students routes
Route::get('/home', 'Student\IndexController@index')->name('home');
