<?php

namespace App\Http\Controllers\Employee;

use App\CustodyType;
use App\DataTables\EmployeeCustodyDatatable;
use App\EmployeeCustody;
use App\EmployeeGeneralData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustodyController extends Controller
{
    private function rules (){
        return $rules =  [
            'employee_id'=>'Required',
            'custody_type_id'=>'Required',
            'custody_number'=>'Required',
            'name' => 'Required|max:50',
        ];
    }


    public function index(EmployeeCustodyDatatable $datatable)
    {
        return $datatable->render('employees.custodys.index');
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

        $custady = new EmployeeCustody();
        $validator = Validator::make($request->all(),$this->rules());
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $custady->employee_id = $request->employee_id ;
        $custady->custody_type_id = $request->custody_type_id ;
        $custady->name = $request->name ;
        $custady->custody_number = $request->custody_number ;
        $custady->custody_data = $request->custody_data ;
        $custady->custody_received_date = $request->custody_received_date ;
        $custady->custody_checking_date = $request->custody_checking_date ;
        $custady->custody_insurance_expiry_date = $request->custody_insurance_expiry_date ;
        $custady->custody_expiry_form_date = $request->custody_expiry_form_date ;
        $custady->custody_return_date = $request->custody_return_date ;

        $custady->save();
        return redirect()->back()->with('success',__('general.success'));
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

        $custady =  EmployeeCustody::find($id);
        $validator = Validator::make($request->all(),$this->rules());
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $custady->employee_id = $request->employee_id ;
        $custady->custody_type_id = $request->custody_type_id ;
        $custady->name = $request->name ;
        $custady->custody_number = $request->custody_number ;
        $custady->custody_data = $request->custody_data ;
        $custady->custody_received_date = $request->custody_received_date ;
        $custady->custody_checking_date = $request->custody_checking_date ;
        $custady->custody_insurance_expiry_date = $request->custody_insurance_expiry_date ;
        $custady->custody_expiry_form_date = $request->custody_expiry_form_date ;
        $custady->custody_return_date = $request->custody_return_date ;
        $custady->save();
        return redirect()->back()->with('success',__('general.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $custody = EmployeeCustody::find($id);
        $custody->delete();
        return redirect()->back()->with('success',__('general.success'));

    }
}
