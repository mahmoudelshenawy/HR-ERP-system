<?php

namespace App\Http\Controllers\Employee;

use App\BusinessBranch;
use App\DataTables\MovementsDataTable;
use App\EmployeeGeneralData;
use App\EmployeeMovement as Movement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeMovement extends Controller
{
    public function index(MovementsDataTable $dataTable)
    {

        return $dataTable->render('employees.movement.index');
        // $movements = Movement::all();
        // $employees  =EmployeeGeneralData::all();
        // $branches = BusinessBranch::all();
        // return view('employees.movement.index',compact('employees','branches','movements'));
    }

    public function ajax_get_new_branch(Request $request)
    {
        $employee = EmployeeGeneralData::find($request->employee_id);
        $new_branch = BusinessBranch::where('id', "!=", $employee->branch_id)->get();

        return response()->json($new_branch);
    }
    public function ajax_get_new_job(Request $request)
    {

        $jobs =  \DB::table('business_branches')
            ->join('business_administrations', 'business_branches.id', '=', 'business_administrations.business_branche_id')
            ->join('business_departments', 'business_administrations.id', '=', 'business_departments.business_administration_id')
            ->join('business_jobs', 'business_departments.id', '=', 'business_jobs.business_department_id')
            ->where('business_branches.id', '=', $request->branch_id)
            ->select('business_jobs.*')
            ->get();
        return response()->json($jobs);
    }
    public function store(Request $request)
    {
        $employee_personal_data = new EmployeeGeneralData();
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'new_branch' => 'required',
            'new_job' => 'required',
        ], [
            'employee_id.required' => trans('validation.custom.employee_id.required'),
            'new_branch.required' => trans('validation.custom.new_branch.required'),
            'new_job.required' => trans('validation.custom.new_job.required')
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $movement = new Movement();
        $employee =  EmployeeGeneralData::find($request->employee_id);
        $movement->employee_id = $request->employee_id;
        $movement->old_branch = $employee->branch_id;
        $movement->new_branch = $request->new_branch;
        $movement->old_job = $employee->job_id;
        $movement->new_job = $request->new_job;
        $movement->movement_date = $request->movement_date;
        $movement->save();
        $employee->branch_id =  $request->new_branch;
        $employee->job_id =  $request->new_job;
        $employee->save();
        return redirect()->back()->with('success', __('general.success'));
    }
    public function show($id)
    {
        $movement = Movement::findOrFail($id);
        return response()->json([
            'data' => $movement
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'new_branch' => 'required',
            'new_job' => 'required',
        ], [
            'employee_id.required' => trans('validation.custom.employee_id.required'),
            'new_branch.required' => trans('validation.custom.new_branch.required'),
            'new_job.required' => trans('validation.custom.new_job.required')
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $movement =  Movement::findOrFail($id);
        $employee =  EmployeeGeneralData::find($request->employee_id);
        $movement->employee_id = $request->employee_id;
        $movement->old_branch = $employee->branch_id;
        $movement->new_branch = $request->new_branch;
        $movement->old_job = $employee->job_id;
        $movement->new_job = $request->new_job;
        $movement->movement_date = $request->movement_date;
        $movement->save();
        $employee->branch_id =  $request->new_branch;
        $employee->job_id =  $request->new_job;
        $employee->save();
        return redirect()->back()->with('success', __('general.success'));
    }

    public function destroy($id)
    {
        $movement = Movement::findOrFail($id);
        $movement->delete();
        return redirect()->back()->with('success', __('general.success'));
    }
}
