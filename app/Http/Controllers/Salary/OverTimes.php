<?php

namespace App\Http\Controllers\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OverTime;
use App\DataTables\OverTimesDataTable;
use App\DataTables\TestDataTable;
use App\EmployeeGeneralData;
use App\Imports\OverTimesImport;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class OverTimes extends Controller
{

    public function index(OverTimesDataTable $datatable)
    {
        return $datatable->render("salary.over_time.index");
    }

    public function create(TestDataTable $datatable)
    {
        // return 'fuck you again';
        // Querry Builder Here
        $employees = DB::table('employee_general_data AS employee')->where('statue', 'active')->join('business_branches AS branch', 'employee.branch_id', '=', 'branch.id')
            ->select(['branch.name', 'branch.id', 'employee.*'])->get();

        return $employees;
        return $datatable->render("salary.over_time.test");
        $testCollection = collect([
            ["id" => 3, "name" => "sam", "age" => 22],
            ["id" => 3, "name" => "sam", "age" => 22]
        ]);
        // $user->put('test', 12222);

        $users = User::all();
        $employee = EmployeeGeneralData::find(1)->only(['id', 'code']);
        $employees = EmployeeGeneralData::all()->groupBy('basic_salary', 'DESCENDING');
        $employees_names = EmployeeGeneralData::all();
        $names = $employees_names->pluck('employee_name', 'id', 'code');
        // return $names->all();

        $max_salary = $employees->max('basic_salary');
        $high_paid = EmployeeGeneralData::where('basic_salary', $max_salary)->first();
        return $high_paid;

        return $max_salary;
        $keyedEmps = $employees->mapWithKeys(function ($employee) {
            return ['code ' . $employee['code'] => [
                $employee['employee_name'],
                $employee['job_id']
            ]];
        });
        return $keyedEmps->all();
        return $employees;
        $items = $users->filter(function ($value, $key) {
            return $value->id === 1;
        });

        $selected = $users->firstWhere('id', 1);
        // $selected = $selected->keys();
        $get = $users->get('id', 'name');

        $modified = $users->filter(function ($value) use ($employee) {
            return  $value->officed = $employee[0]->id;
        });
        $modified = $users->map(function ($value) use ($employee) {
            return  $value->officed = $employee[0]->id;
        });

        return $modified->all();

        // return $modified;
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'month' => 'required',
            'over_time_amount' => 'required|numeric',
        ]);

        $over_time = new OverTime();
        $employee = EmployeeGeneralData::findOrFail($request->employee_id);
        $over_time->employee_id = $request->employee_id;
        $over_time->code = $employee->code;
        $over_time->month = $request->month;
        $over_time->over_time_amount = $request->over_time_amount;

        $over_time->save();
        return  redirect()->back()->with('success', 'success');
    }

    public function show($id)
    {
        $over_time = OverTime::findOrFail($id);
        return response()->json(['data' => $over_time]);
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

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'month' => 'required',
            'over_time_amount' => 'required|numeric',
        ]);

        $over_time = OverTime::findOrFail($id);

        $employee = EmployeeGeneralData::findOrFail($request->employee_id);
        $over_time->employee_id = $request->employee_id;
        $over_time->code = $employee->code;
        $over_time->month = $request->month;
        $over_time->over_time_amount = $request->over_time_amount;

        $over_time->update();
        return  redirect()->back()->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $over_time = OverTime::findOrFail($id);
        $over_time->delete();
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
            Excel::import(new OverTimesImport($request->month), $request->file('file'));
            return  redirect()->back()->with('success', 'success');
        } catch (\Exception $e) {
            \Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
