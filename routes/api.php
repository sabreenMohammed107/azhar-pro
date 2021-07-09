<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
   
});

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');
// buildings
Route::get('buildings', 'Api\BuildingController@index');
Route::get('show-building/{id}', 'Api\BuildingController@show');
Route::get('show-room/{id}', 'Api\BuildingController@showRoom');
Route::middleware('auth:api')->group(function () {

    Route::post('logout', 'Api\AuthController@logout');
    // accomodate
    Route::post('accomodate-request', 'Api\AccomodationController@accomodateRequest')->name('accomodate-request');
    Route::post('accomodate-status/{code}', 'Api\AccomodationController@accomodateStatus');

    // leaves
    Route::post('leave-request', 'Api\LeavesController@leaveRequest');
    Route::post('leave-status/{code}', 'Api\LeavesController@leaveStatus');
    //All
    Route::get('all-accomodation', 'Api\AccomodationController@accomodatationAll');
    Route::get('all-leaves', 'Api\LeavesController@leavesAll');
    });


