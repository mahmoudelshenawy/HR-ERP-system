<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::any('attendance-rules', 'AttendanceRules@index');
Route::post('attendance-rules/import', 'AttendanceRules@import');

Route::resource('attendance', 'Attendance');

Route::resource('holidays', 'Holidays');

Route::resource('leave-types', 'LeaveTypes');

Route::resource('employee-leaves', 'EmployeeLeaves');

Route::resource('delay-penalties', 'DelayPenalties');

Route::resource('custom-delay-penalties', 'CustomDelayPenalties');

Route::resource('absence-penalties', 'AbsencePenalties');

Route::resource('shifts', 'Shifts');

Route::resource('employees_shifts', 'EmployeeShift');

Route::resource('attendence_permissions', 'AttenencePermissions');

Route::resource('commission_permissions', 'CommissionPermissions');

Route::resource('grace_period', 'GracePeriods');
