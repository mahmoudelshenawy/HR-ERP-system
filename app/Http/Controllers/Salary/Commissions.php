<?php

namespace App\Http\Controllers\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Commission;
use App\EmployeeGeneralData;
use App\DataTables\CommissionsDataTable;
use App\Imports\CommissionsImport;
use Maatwebsite\Excel\Facades\Excel;

class Commissions extends Controller
{

    public function index(CommissionsDataTable $datatable)
    {
        return $datatable->render("salary.commission.index");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'month' => 'required',
            'commission_amount' => 'required|numeric',
        ]);

        $commission = new Commission();
        $employee = EmployeeGeneralData::findOrFail($request->employee_id);
        $commission->employee_id = $request->employee_id;
        $commission->code = $employee->code;
        $commission->month = $request->month;
        $commission->commission_amount = $request->commission_amount;

        $commission->save();
        return  redirect()->back()->with('success', 'success');
    }

    public function show($id)
    {
        $commission = Commission::findOrFail($id);
        return response()->json(['data'  => $commission]);
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
            'commission_amount' => 'required|numeric',
        ]);

        $commission = Commission::findOrFail($id);
        $employee = EmployeeGeneralData::findOrFail($request->employee_id);
        $commission->employee_id = $request->employee_id;
        $commission->code = $employee->code;
        $commission->month = $request->month;
        $commission->commission_amount = $request->commission_amount;

        $commission->update();
        return  redirect()->back()->with('success', 'success');
    }


    public function destroy($id)
    {
        $commission = Commission::findOrFail($id);
        $commission->delete();
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
            Excel::import(new CommissionsImport($request->month), $request->file('file'));
            return  redirect()->back()->with('success', 'success');
        } catch (\Exception $e) {
            \Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
