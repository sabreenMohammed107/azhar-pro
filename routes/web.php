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
//home
Route::get('/', 'Student\IndexController@index');
//Login & register
Route::get('/student/login', 'Auth\LoginStudentController@showLoginStudentForm')->name('student.login');
Route::post('/student/login', 'Auth\LoginStudentController@attemptLogin')->name('student.login');
Route::get('/student/register', 'Auth\RegisterStudentController@showRegisterForm')->name('student.register');
Route::post('/student/register', 'Auth\RegisterStudentController@create')->name('student.register');
Route::post('student-logout', 'Auth\LoginStudentController@logout')->name('student-logout');
//profile
Route::get('show-student/{id}', 'Student\ProfileController@show');
Route::get('edit-student/{id}', 'Student\ProfileController@edit');
Route::post('updateProfile', 'Student\ProfileController@updateProfile');
//reports

Route::get('/student/all-accomodations', 'Student\AccomadationController@index');
Route::get('/student/accomodate-status', 'Student\AccomadationController@showAccomodateStatus');
Route::get('/student/check-accomodate-status', 'Student\AccomadationController@accomodateStatus')->name('check-accomodate-status');

Route::get('/student/all-leaves', 'Student\LeaveController@index');
Route::get('/student/leave-status', 'Student\LeaveController@showLeaveStatus');
Route::get('/student/check-leave-status', 'Student\LeaveController@leaveStatus')->name('check-leave-status');
// requests

Route::get('/student/accomodate-request', 'Student\AccomadationController@accomodateRequest');
Route::post('/student/update-accomodate-request', 'Student\AccomadationController@updateAccomodateRequest');

Route::get('/student/leave-request', 'Student\LeaveController@leaveRequest');
Route::post('/student/update-leave-request', 'Student\LeaveController@updateLeaveRequest');

//building & rooms


Route::get('/buildings', 'Student\BuildingsController@index');
Route::post('load-data', 'Student\BuildingsController@loadMoreData')->name('load-data');
Route::get('/rooms/{id}', 'Student\BuildingsController@rooms');
Route::post('load-rooms-data', 'Student\BuildingsController@loadMoreDataRooms')->name('load-rooms-data');
Route::get('/singleRoom/{id}', 'Student\BuildingsController@singleRoom');
//booking

Route::post('/book-room', 'Student\BuildingsController@BookRoom');

