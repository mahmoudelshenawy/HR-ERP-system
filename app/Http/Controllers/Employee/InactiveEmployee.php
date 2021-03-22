<?php

namespace App\Http\Controllers\Employee;

use App\DataTables\InactiveDatatable;
use App\EmployeeGeneralData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use  App\InactiveEmployee as Inactive;

class InactiveEmployee extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param InactiveDatatable $datatable
     * @return void
     */
    public function index(InactiveDatatable $datatable)
    {
        return $datatable->render('employees.inactive_employee.index');
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
        $inactive = new Inactive();
         Validator::make($request->all(),[
            'employee_id'=>'Required',
            'date'=>'Required',
        ],[],[
            'employee_id'=>trans('employee.employee'),
            'date'=>trans('employee.inactive_date'),
        ]);

        $inactive->employee_id = $request->employee_id;
        $inactive->date = $request->date;
        $inactive->reason = $request->reason;
        $inactive->created_by = auth()->user()->id;
        DB::table('employee_general_data')
            ->where('id', $request->employee_id)
            ->update(['statue' => 'inactive']);
        foreach (EmployeeGeneralData::where('manager_id',$request->employee_id)->get() as $employee){
            if (DB::table('employee_general_data')->where('id',$request->employee_id)->value('manager_id') !=null){
                $employee->manager_id = DB::table('employee_general_data')->where('id',$request->employee_id)->value('manager_id');
                $employee->save();
            }else{
                $employee->manager_id = null;
                $employee->save();
            }
        }
        $inactive->save();

        return redirect()->back()->with('success',trans('general.success_inactive'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inactive = Inactive::find($id);
        if ($inactive) {
            $employee = EmployeeGeneralData::find($inactive->employee_id);
            $employee->statue = 'active';
            $employee->save();
            $inactive->delete();
        }
        return redirect()->back()->with("success",__('general.success_cancel_inactive'));
    }

}
