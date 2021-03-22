<?php

namespace App\Http\Controllers\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Advance;
use App\DataTables\AdvanceDataTable;
use App\EmployeeGeneralData;
use App\Imports\AdvanceImport;
use Maatwebsite\Excel\Facades\Excel;

class Advances extends Controller
{
    public function index(AdvanceDataTable $datatable)
    {
        return $datatable->render("salary.advance.index");
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
            'advance_amount' => 'required|numeric',
        ]);

        $advance = new Advance();
        $employee = EmployeeGeneralData::findOrFail($request->employee_id);
        $advance->employee_id = $request->employee_id;
        $advance->code = $employee->code;
        $advance->month = $request->month;
        $advance->advance_amount = $request->advance_amount;

        $advance->save();
        return  redirect()->back()->with('success', 'success');
    }

    public function show($id)
    {
        $advance = Advance::findOrFail($id);
        return response()->json(['data'  => $advance]);
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
            'advance_amount' => 'required|numeric',
        ]);

        $advance = Advance::findOrFail($id);
        $employee = EmployeeGeneralData::findOrFail($request->employee_id);
        $advance->employee_id = $request->employee_id;
        $advance->code = $employee->code;
        $advance->month = $request->month;
        $advance->advance_amount = $request->advance_amount;

        $advance->update();
        return  redirect()->back()->with('success', 'success');
    }


    public function destroy($id)
    {
        $advance = Advance::findOrFail($id);
        $advance->delete();
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
            Excel::import(new AdvanceImport($request->month), $request->file('file'));
            return  redirect()->back()->with('success', 'success');
        } catch (\Exception $e) {
            \Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
