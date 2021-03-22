<?php

namespace App\Http\Controllers\TimeManagement;

use App\DataTables\EmployeeShiftsDataTable;
use App\EmployeeGeneralData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeShift extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeShiftsDataTable $dataTable)
    {
        return $dataTable->render('time_management.employees_shifts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required|unique:employee_shifts,id',
            'shift_id' => 'required',
        ],[],[
            'employee_id' => trans('employee.employee_name'),
            'shift_id' => trans('time_management.shift_name'),

        ]);
        foreach ($request->employee_id as $employee_id){
            $employee_shift = new \App\EmployeeShift();
            $employee_shift->employee_id = $employee_id;
            $employee_shift->shift_id = $request->shift_id;
            $employee_shift->save();
        }
        session()->flash('success', __('record has been created'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_id' => 'required|unique:employee_shifts,id',
            'shift_id' => 'required',
        ],[],[
            'employee_id' => trans('employee.employee_name'),
            'shift_id' => trans('time_management.shift_name'),

        ]);
            $employee_shift = \App\EmployeeShift::find($id);
            $employee_shift->employee_id = $request->employee_id;
            $employee_shift->shift_id = $request->shift_id;
            $employee_shift->save();
        session()->flash('success', __('record has been updated'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = \App\EmployeeShift::findOrFail($id);
        $shift->delete();
        session()->flash('success', __('record has been deleted'));
        return back();
    }
}
