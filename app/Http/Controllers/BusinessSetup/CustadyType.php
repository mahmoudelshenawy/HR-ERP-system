<?php

namespace App\Http\Controllers\BusinessSetup;

use App\CustodyType;
use App\DataTables\CustodyTypesDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustadyType extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CustodyTypesDatatable $datatable
     * @return \Illuminate\Http\Response
     */

    public function index(CustodyTypesDatatable $datatable)
    {
        return  $datatable->render('business-setup.custodes-type.index');
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
        //
        $validator = Validator::make($request->all(), ['custadyType' => 'Required|max:255']);
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $custadyType = new CustodyType();
        $custadyType->name = $request->custadyType ;
        $custadyType->save();
        return redirect()->back()->with("success",__('general.success'));
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
        $validator = Validator::make($request->all(), ['custadyType' => 'Required|max:255']);
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $custadyType = CustodyType::find($id);
        $custadyType->name = $request->custadyType ;
        $custadyType->save();
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
        $custadyType = CustodyType::find($id);
        if ($custadyType) {
            $custadyType->delete();
        }
        return redirect()->back()->with("success",__('general.successDeleted'));
    }
}
