<?php

namespace App\Http\Controllers\BusinessSetup;

use App\ContractType;
use App\DataTables\ContractTypesDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ContractTypesDatatable $datatable
     * @return \Illuminate\Http\Response
     */
    public function index(ContractTypesDatatable $datatable)
    {
         return $datatable->render('business-setup.contract-type.index');
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
        $validator = Validator::make($request->all(), ['name' => 'Required|max:255','arabicName'=>'max:255']);
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $contractType = new ContractType();
        $contractType->name = $request->name;
        $contractType->arabic_name = $request->arabicName;
        $contractType->statue =$request->statue;
        $contractType->save();
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
        //
        $validator = Validator::make($request->all(), ['name' => 'Required|max:255','arabicName'=>'max:255']);
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $contractType = ContractType::find($id);
        $contractType->name = $request->name;
        $contractType->arabic_name = $request->arabicName;
        $contractType->statue =$request->statue;
        $contractType->save();
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
        //
        $contractType = ContractType::find($id);
        if ($contractType){
            $contractType->delete();
            return redirect()->back()->with("success",__('general.successDeleted'));
        }
    }
}
