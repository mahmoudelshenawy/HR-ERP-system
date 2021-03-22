<?php

namespace App\Http\Controllers\Employee;

use App\Companion;
use App\DataTables\CompanionsDatatable;
use App\EmployeeGeneralData;
use App\Http\Controllers\Controller;
use App\MedicalInsurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanionController extends Controller
{

    private function rules ($id){
        return $rules =  [
            'employee_id'=>'Required',
            'name' => 'Required|max:50',
            'residence_number'=> 'nullable|Numeric|digits_between:7,20|Unique:companions,residence_number,'.$id,
            'medical_insurance_type'=> 'nullable',
            'medical_insurance_number'=>'nullable|numeric||Unique:companions,medical_insurance_number,'.$id,
            'medical_insurance_start_data'=>'nullable|string',
            'medical_insurance_end_data'=>'nullable|string',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompanionsDatatable $datatable)
    {

        return $datatable->render('employees.companions.index');
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

        $companion = new Companion();
        $validator = Validator::make($request->all(),$this->rules($companion->id));
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $companion->employee_id = $request->employee_id ;
        $companion->name = $request->name ;
        $companion->national_id = $request->national_id ;
        $companion->residence_number = $request->residence_number ;
        if ($request->has('medical_insurance_statue')){
            if ($request->medical_insurance_statue == 'on' || $request->medical_insurance_statue == 1){
                $companion->medical_insurance_statue = 1;
            }else{
                $companion->medical_insurance_statue = 0;
            }
        }
        $companion->medical_insurance_type = $request->medical_insurance_type ;
        $companion->birth_date = $request->birth_date ;
        $companion->medical_insurance_id = $request->medical_insurance_id ;
        $companion->medical_insurance_number = $request->medical_insurance_number ;
        $companion->medical_insurance_start_data = $request->medical_insurance_start_data ;
        $companion->medical_insurance_end_data = $request->medical_insurance_end_data ;
        if ($request->has('statue')){
            if ($request->statue == 'on' || $request->statue == 1){
                $companion->statue = 1;
            }else{
                $companion->statue = 0;
            }
        }else{
            $companion->statue = 0;
        }
        $companion->save();
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

        $companion =  Companion::find($id);
        $validator = Validator::make($request->all(),$this->rules($companion->id));
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $companion->employee_id = $request->employee_id ;
        $companion->name = $request->name ;
        $companion->national_id = $request->national_id ;
        $companion->residence_number = $request->residence_number ;
        $companion->medical_insurance_type = $request->medical_insurance_type ;
        $companion->birth_date = $request->birth_date ;
        $companion->medical_insurance_id = $request->medical_insurance_id ;
        $companion->medical_insurance_number = $request->medical_insurance_number ;
        $companion->medical_insurance_start_data = $request->medical_insurance_start_data ;
        $companion->medical_insurance_end_data = $request->medical_insurance_end_data ;
        if ($request->has('statue')){
            if ($request->statue == 'on' || $request->statue == 1){
                $companion->statue = 1;
            }else{
                $companion->statue = 0;
            }
        }
        $companion->save();
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
        $companion =Companion::find($id);
        $companion->delete();
        return redirect()->back()->with('success',__('general.success'));
    }
}
