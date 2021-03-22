<?php

use Illuminate\Support\Facades\Route;

Route::pattern('id', '[0-9]+');

Route::any('/', 'EmployeesController@index');
Route::any('/list', 'EmployeesController@employees_list');
Route::get('/add/{branch_id?}', 'EmployeesController@add');
Route::post('/add/', 'EmployeesController@post_add');
Route::get('/{id}', 'EmployeesController@show');
Route::put('/update/{id}', 'EmployeesController@update');
Route::get('/print-profile/{id}', 'EmployeesController@print');
Route::get('/export-data', 'ExportEmployeesController@excel');

// Route::post('/{id}/add_allowance', 'EmployeesController@storeAllowance');
Route::resource('employee_allowance', 'EmployeeAllowances');
Route::resource('employee_deduction', 'EmployeeDeductions');



Route::resource('companions', 'CompanionController');
Route::resource('custodys', 'CustodyController');
Route::resource('loans', 'LoansController');
Route::resource('resignations', 'ResignationController');
Route::resource('inactive', 'InactiveEmployee');

Route::resource('movement', 'EmployeeMovement');
Route::post('movement/store', 'EmployeeMovement@store')->name('store_movement');
Route::post('/movement/get-new-branch', 'EmployeeMovement@ajax_get_new_branch')->name('ajax_get_new_branch');
Route::post('/movement/get-new-job', 'EmployeeMovement@ajax_get_new_job')->name('ajax_get_new_job');

Route::get('attendance-rules', 'EmployeeAttendanceRulesController@index');

// Route::resource('employee_allowance', 'Employee');
