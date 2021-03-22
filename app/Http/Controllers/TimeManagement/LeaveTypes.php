<?php

namespace App\Http\Controllers\TimeManagement;

use App\DataTables\LeaveTypeDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LeaveTypes as Leaves;

class LeaveTypes extends Controller
{

    /**
     * @var mixed
     */

    public function index(LeaveTypeDatatable $datatable)
    {
        if (request()->ajax() && request()->has('type_cat')){
            $type_cat = request()->type_cat;
            return response()->json(['type_cat'=>$type_cat]);
        }
        return  $datatable->render('time_management.leave_types.index');
    }



    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'type_cat' => 'required',
        ]);

       $leave = new Leaves();
       $leave->name = $request->name;
       $leave->type_cat = $request->type_cat;
       $leave->deduct_type = $request->deduct_type;
       $leave->amount = $request->amount;
       $leave->save();
        session()->flash('success', __('record has been created'));
        return back();
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
         $this->validate($request, [
            'name' => 'required',
            'type_cat' => 'required',
        ]);
        $leave =Leaves::find($id);
        $leave->name = $request->name;
        $leave->type_cat = $request->type_cat;
        $leave->deduct_type = $request->deduct_type;
        $leave->amount = $request->amount;
        $leave->save();
        session()->flash('success', __('record has been created'));
        return back();
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
    }
}
