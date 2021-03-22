<?php

use Illuminate\Support\Facades\Route;

Route::resource('over_time', 'OverTimes');
Route::post('over_time/import', 'OverTimes@import');


Route::resource('commissions', 'Commissions');
Route::post('commissions/import', 'Commissions@import');


Route::resource('allowance', 'Allowances');
Route::post('allowance/import', 'Allowances@import');


Route::resource('advance', 'Advances');
Route::post('advance/import', 'Advances@import');


Route::resource('absence_delay_penalty', 'AbsenceDelayPenalties');
Route::post('absence_delay_penalty/import', 'AbsenceDelayPenalties@import');

Route::resource('net_salary', 'NetSalaryController');

Route::post('net_salary/calculate', 'NetSalaryController@calculate_net_salaries');
