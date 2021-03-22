<?php

namespace App\Http\Controllers\BusinessSetup;

use App\BankData;
use App\DataTables\BanksDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function rules ($id){
        return $rules =  [
            'name' => 'Required|max:50|unique:bank_data,name,'.$id,
            'phone'=> 'nullable|Numeric|Unique:bank_data,phone,'.$id,
            'code'=> 'nullable|max:20|Unique:bank_data,code,'.$id,
            'address'=> 'nullable|max:200',
        ];
    }


    public function index(BanksDatatable $datatable)
    {
      return $datatable->render('business-setup.bank-data.index');
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
        $banks = new BankData();
        $validator = Validator::make($request->all(),$this->rules($banks->id));
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $banks->code = $request->code ;
        $banks->name = $request->name ;
        $banks->phone = $request->phone ;
        $banks->address = $request->address ;
        $banks->save();
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
        $banks = BankData::find($id);
        $banks->code = $request->code ;
        $banks->name = $request->name ;
        $banks->phone = $request->phone ;
        $banks->address = $request->address ;
        $banks->save();
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
        $banks = BankData::find($id);
        if ($banks){
            $banks->delete();
        }
        return redirect()->back()->with("success",__('general.successDeleted'));
    }
}
