<?php

namespace App\Http\Controllers\BusinessSetup;

use App\BusinessDepartment;
use App\BusinessAdministration;
use App\BusinessBranch;
use App\DataTables\DepartmentsDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\all;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param DepartmentsDatatable $datatable
     * @return \Illuminate\Http\Response
     */
    public function index(DepartmentsDatatable $datatable)
    {
        $departments = BusinessDepartment::with('administration')->get();
        $branches = BusinessBranch::all();
        $administration = BusinessAdministration::all();
        return $datatable->render('business-setup.business-department.index',compact('departments','branches','administration'));
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
        $validator = Validator::make($request->all(), ['departmentName' => 'Required|max:255','administrationName'=>'Required']);
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->has('administrationName')){
            foreach ($request->administrationName as $administration){
                $department = new BusinessDepartment();
                $department->name = $request->departmentName ;
                $department->business_administration_id = $administration ;
                $department->save();
            }
            return redirect()->back()->with("success",__('general.success'));
        }
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
        $validator = Validator::make($request->all(), ['departmentName' => 'Required|max:255','administrationName'=>'Required']);
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->has('administrationName')) {

                $department = BusinessDepartment::find($id);
                $department->name = $request->departmentName;
                $department->business_administration_id = $request->administrationName;
                $department->save();

        }
        return redirect()->back()->with("success",__('general.success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = BusinessDepartment::find($id);
        if ($department){
            $department->delete();
            return redirect()->back()->with("success",__('general.successDeleted'));
        }

    }
}
