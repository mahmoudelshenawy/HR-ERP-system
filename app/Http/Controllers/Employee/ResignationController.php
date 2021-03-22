<?php

namespace App\Http\Controllers\Employee;

use App\DataTables\ResignationsDatatable;
use App\EmployeeGeneralData;
use App\Http\Controllers\Controller;
use App\Resignation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ResignationController extends Controller
{

    public function index(ResignationsDatatable $datatable)
    {
        return $datatable->render('employees.resignations.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $resignation = new Resignation();
        $validator = Validator::make($request->all(),[
            'employee_id'=>'Required',
            'date'=>'Required',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $resignation->employee_id = $request->employee_id;
        $resignation->date = $request->date;
        $resignation->reason = $request->reason;
        $resignation->statue = 'approved';
        $resignation->created_by = auth()->user()->id;
        DB::table('employee_general_data')
            ->where('id', $request->employee_id)
            ->update(['statue' => 'resignation']);
        foreach (EmployeeGeneralData::where('manager_id',$request->employee_id)->get() as $employee){
            if (DB::table('employee_general_data')->where('id',$request->employee_id)->value('manager_id') !=null){
                $employee->manager_id = DB::table('employee_general_data')->where('id',$request->employee_id)->value('manager_id');
                $employee->save();
            }else{
                $employee->manager_id = null;
                $employee->save();
            }
        }
        $resignation->save();

        return redirect()->back()->with('success',trans('general.success'));
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $resignation = Resignation::find($id);
        if ($resignation) {
            $employee = EmployeeGeneralData::find($resignation->employee_id);
            $employee->statue = 'active';
            $employee->save();
            $resignation->delete();
        }
        return redirect()->back()->with("success",__('general.successDeleted'));
    }
}
