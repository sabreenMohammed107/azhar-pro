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
    Route::get('admin', 'Admin\IndexController@index')->name('admin');
    // setup
    Route::resource('admin/students', 'Admin\StudentsController');
    Route::resource('admin/educationYear', 'Admin\EducationYearController');
    Route::resource('admin/requestStatus', 'Admin\RequestStatusController');
    Route::resource('admin/city', 'Admin\CityController');
    Route::resource('admin/educationStatus', 'Admin\EducationStatusController');
    Route::resource('admin/faculty', 'Admin\FacultyController');
    Route::resource('admin/division', 'Admin\DivisionController');
    Route::resource('admin/department', 'Admin\DepartmentController');
    Route::resource('admin/grade', 'Admin\GradeController');
    Route::resource('admin/parentRelation', 'Admin\ParentRelationController');
    //data controll
    Route::resource('admin/building', 'Admin\BuildingController');
    Route::resource('admin/room', 'Admin\RoomsController');
     //request
     Route::resource('admin/accomodationRequest', 'Admin\AccomodationRequestController');
     Route::resource('admin/leaveRequest', 'Admin\LeaveRequestController');

});

//students routes
Route::get('/home', 'Student\IndexController@index')->name('home');
