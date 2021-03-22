<?php

namespace App\Http\Controllers\BusinessSetup;

use App\DataTables\InsuranceProvidersDatatable;
use App\Http\Controllers\Controller;
use App\MedicalInsurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicalInsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function rules ($id){
        return $rules =  [
            'name' => 'Required|max:50|unique:medical_insurances,name,'.$id,
            'phone'=> 'nullable|Numeric|Unique:medical_insurances,phone,'.$id,
            'code'=> 'nullable|max:20|Unique:medical_insurances,code,'.$id,
            'address'=> 'nullable|max:200',
        ];
    }


    public function index(InsuranceProvidersDatatable $datatable)
    {
        //
       return $datatable->render('business-setup.medical-insurance.index');
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
        $medicals = new MedicalInsurance();
        $validator = Validator::make($request->all(),$this->rules($medicals->id));
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $medicals->code = $request->code ;
        $medicals->name = $request->name ;
        $medicals->phone = $request->phone ;
        $medicals->address = $request->address ;
        $medicals->save();
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $validator = Validator::make($request->all(),$this->rules($id));
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $medicals = MedicalInsurance::find($id);
        $medicals->code = $request->code ;
        $medicals->name = $request->name ;
        $medicals->phone = $request->phone ;
        $medicals->address = $request->address ;
        $medicals->save();
        return redirect()->back()->with("success",__('general.successEdite'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicals = MedicalInsurance::find($id);
        if ($medicals){
            $medicals->delete();
        }
        return redirect()->back()->with("success",__('general.successDeleted'));
    }
}
