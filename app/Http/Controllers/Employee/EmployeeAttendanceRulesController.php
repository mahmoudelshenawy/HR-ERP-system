<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeAttendanceRulesController extends Controller
{
    //

    public function index(){

        return view('employees.employees_attendance_rules.index');
    }
}
