<?php

namespace App\Http\Controllers\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AbsenceDelayPenalty;
use App\DataTables\AbsenceDelayPenaltiesDataTable;
use App\EmployeeGeneralData;
use App\Imports\AbsenceDelayImport;
use Maatwebsite\Excel\Facades\Excel;

class AbsenceDelayPenalties extends Controller
{
    public function index(AbsenceDelayPenaltiesDataTable $datatable)
    {
        return $datatable->render("salary.absence_delay.index");
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'month' => 'required',
            'absence_subtract' => 'required|numeric',
            'delay_subtract' => 'required|numeric',
        ]);

        $absence_delay = new AbsenceDelayPenalty();
        $employee = EmployeeGeneralData::findOrFail($request->employee_id);
        $absence_delay->employee_id = $request->employee_id;
        $absence_delay->month = $request->month;
        $absence_delay->code = $employee->code;
        $absence_delay->absence_subtract = $request->absence_subtract;
        $absence_delay->delay_subtract = $request->delay_subtract;

        $absence_delay->save();
        return  redirect()->back()->with('success', 'success');
    }

    public function show($id)
    {
        $absence_delay = AbsenceDelayPenalty::findOrFail($id);
        return response()->json(['data'  => $absence_delay]);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'month' => 'required',
            'absence_subtract' => 'required|numeric',
            'delay_subtract' => 'required|numeric',
        ]);

        $absence_delay = AbsenceDelayPenalty::findOrFail($id);
        $employee = EmployeeGeneralData::findOrFail($request->employee_id);
        $absence_delay->employee_id = $request->employee_id;
        $absence_delay->month = $request->month;
        $absence_delay->code = $employee->code;
        $absence_delay->absence_subtract = $request->absence_subtract;
        $absence_delay->delay_subtract = $request->delay_subtract;

        $absence_delay->update();
        return  redirect()->back()->with('success', 'success');
    }


    public function destroy($id)
    {
        $absence_delay = AbsenceDelayPenalty::findOrFail($id);
        $absence_delay->delete();
        return  redirect()->back()->with('success', 'success');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);
        $extensions = array("xls", "xlsx", "xlm", "xla", "xlc", "xlt", "xlw");

        $result = array($request->file('file')->getClientOriginalExtension());

        if (!in_array($result[0], $extensions)) {
            session()->flash('error', __('extention of file not correct'));
            return back();
        }
        try {
            Excel::import(new AbsenceDelayImport($request->month), $request->file('file'));
            return  redirect()->back()->with('success', 'success');
        } catch (\Exception $e) {
            \Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
