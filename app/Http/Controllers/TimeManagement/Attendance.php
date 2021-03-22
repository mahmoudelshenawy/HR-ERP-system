<?php

namespace App\Http\Controllers\TimeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmployeeAttendence;
use Yajra\DataTables\Facades\DataTables;

class Attendance extends Controller
{

    public function index(Request $request)
    {
        if (request()->ajax()) {
            $all_attendence = EmployeeAttendence::with('employee_name');
            return DataTables::of($all_attendence)
                ->addColumn('actions', 'attendance.datatable_columns.actions')
                ->rawColumns(['actions'])
                ->make('true');
            // ->addColumn('checkbox', 'attendance.datatable_columns.checkbox')
        }
        return view('time_management.attendance.employees_attendance');
    }

    public function create()
    {
        return view('time_management.attendance.add');
    }

    public function store(Request $request)
    {

        $request_data =  $this->validate($request, [
            'day' => 'required',
            'employee_code' => 'required',
            'check_in' => 'nullable',
            'check_out' => 'nullable',
        ]);
        EmployeeAttendence::create($request_data);
        session()->flash('success', __('record has been created'));
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $attendance = EmployeeAttendence::findOrFail($id);
        return view('time_management.attendance.edit', compact('attendance'));
    }

    public function update(Request $request, $id)
    {
        $request_data =  $this->validate($request, [
            'day' => 'required',
            'employee_code' => 'required',
            'check_in' => 'nullable',
            'check_out' => 'nullable',
        ]);
        EmployeeAttendence::where('id', $id)->update($request_data);
        session()->flash('success', __('record has been created'));
        return back();
    }

    public function destroy($id)
    {
        $attendance = EmployeeAttendence::find($id);
        $attendance->delete();

        session()->flash('success', __('record has been deleted'));
        return back();
    }

    public function showAttendanceOfEmployees()
    {
        return view('time_management.attendance.employees_attendance');
    }
}
