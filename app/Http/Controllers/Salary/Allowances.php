<?php

namespace App\Http\Controllers\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Allowance;
use App\DataTables\AllowanceDataTable;
use App\EmployeeGeneralData;
use App\Imports\AllowanceImport;
use Maatwebsite\Excel\Facades\Excel;

class Allowances extends Controller
{

    public function index(AllowanceDataTable $datatable)
    {
        return $datatable->render("salary.allowance.index");
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
            'allowance_amount' => 'required|numeric',
        ]);

        $allowance = new Allowance();
        $employee = EmployeeGeneralData::findOrFail($request->employee_id);
        $allowance->employee_id = $request->employee_id;
        $allowance->code = $employee->code;
        $allowance->month = $request->month;
        $allowance->allowance_amount = $request->allowance_amount;

        $allowance->save();
        return  redirect()->back()->with('success', 'success');
    }

    public function show($id)
    {
        $allowance = Allowance::findOrFail($id);
        return response()->json(['data'  => $allowance]);
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
            'allowance_amount' => 'required|numeric',
        ]);

        $allowance = Allowance::findOrFail($id);
        $employee = EmployeeGeneralData::findOrFail($request->employee_id);
        $allowance->employee_id = $request->employee_id;
        $allowance->code = $employee->code;
        $allowance->month = $request->month;
        $allowance->allowance_amount = $request->allowance_amount;

        $allowance->update();
        return  redirect()->back()->with('success', 'success');
    }


    public function destroy($id)
    {
        $allowance = Allowance::findOrFail($id);
        $allowance->delete();
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
            Excel::import(new AllowanceImport($request->month), $request->file('file'));
            return  redirect()->back()->with('success', 'success');
        } catch (\Exception $e) {
            \Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
