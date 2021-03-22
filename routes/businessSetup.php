<?php

use Illuminate\Support\Facades\Route;

Route::resource('business-type', 'BusinessTypeController')->except(['create', 'edit', 'show']);

Route::resource('business-branch', 'BusinessBranchController')->except(['edit'])->names(['create' => 'create_branch']);

Route::post('business-branch/{id}/edit_rules', 'BusinessBranchController@editBranchAttendenceRules');
Route::post('business-branch/{id}/edit_penalties', 'BusinessBranchController@editDelayPenalties');
Route::post('business-branch/{id}/edit_absence_penalties', 'BusinessBranchController@editAbsencePenalties');

Route::post('business-branch/{id}/custom_attendence', 'BusinessBranchController@import');

Route::resource('business-administration', 'AdministrationController')->except(['edit', 'create,show']);
Route::resource('business-department', 'DepartmentController')->except(['edit', 'create,show']);
Route::resource('business-job', 'JobController')->except(['edit', 'create,show']);
Route::resource('guarantor', 'GuarantorController')->except(['edit', 'create,show']);
Route::resource('contract-type', 'ContractTypeController')->except(['edit', 'create,show']);
Route::resource('custodys-type', 'CustadyType')->except(['edit', 'create,show']);
Route::resource('bank-data', 'BankController')->except(['edit', 'create,show']);
Route::resource('medical-insurance-data', 'MedicalInsuranceController')->except(['edit', 'create,show']);

Route::resource('fixed_allowance', 'FixedAllowanceController');

Route::resource('fixed_deduction', 'FixedDeductionController');


Route::get('business-type/deleted-types', 'SoftDeletesContrroller@business_type');
Route::get('business-type/restore/{id}', 'SoftDeletesContrroller@business_type_restore');
