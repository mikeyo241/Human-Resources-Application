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
use App\Employee;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/hrSystem', function () {
  $employees = Employee::activeUser();
  return view('hrSystem', compact('employees'));
});

// This Route uses the EmployeeController Store Method to connect to the database and create a new employee in the database.
Route::post('/create', 'EmployeeController@store');

// This route is used to update the employees information after the user modified data and submitted.
Route::post('/update', 'EmployeeController@update');

Route::post('/cancel', 'EmployeeController@cancel');

Route::post('/confirm', function () {
  return view('confirm');
});

/**
 * This route is used to delete a user from the database.
 * The deletion isn't really a deletion this only changes the column deleted to true in the database.
 */
Route::post('/deleteUser', 'EmployeeController@destroy');