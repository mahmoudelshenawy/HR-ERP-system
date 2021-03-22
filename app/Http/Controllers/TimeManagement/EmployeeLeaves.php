<?php

namespace App\Http\Controllers\TimeManagement;

use App\DataTables\EmployeeLeavesDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmployeeLeaves as Leaves;
use App\EmployeeGeneralData;
use App\EmployeeLeaves as AppEmployeeLeaves;
use App\Holiday;
use Yajra\DataTables\Facades\DataTables;

class EmployeeLeaves extends Controller
{

    public function index(EmployeeLeavesDatatable $datatable)
    {
        return $datatable->render('time_management.leaves.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'employee_id' => 'required',
            'leave_type_id' => 'required',
            'start_day' => 'required',
            'end_day' => 'required',
            'cause' => 'nullable',
        ]);
        $data['status'] = 'approved';
        Leaves::create($data);
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
        $leave  = Leaves::findOrFail($id);
        return response()->json(['data' => $leave]);
    }

    public function edit($id)
    {
        // $vacation = EmployeeLeaves::findOrFail($id);

        // return $vacation;
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_id' => 'required|numeric',
            'leave_type_id' => 'required|numeric',
            'start_day' => 'required',
            'end_day' => 'required',
            'cause' => 'nullable'
        ]);

        Leaves::where('id', $id)->update([
            'employee_id' => $request->employee_id,
            'leave_type_id' => $request->leave_type_id,
            'start_day' => $request->start_day,
            'end_day' => $request->end_day,
            'cause' =>  $request->cause
        ]);
        session()->flash('success', __('record has been updated'));
        return back();
    }


    public function destroy($id)
    {
        $vacation = Leaves::findOrFail($id);
        $vacation->delete();
        session()->flash('success', __('record has been deleted'));
        return back();
    }
}
