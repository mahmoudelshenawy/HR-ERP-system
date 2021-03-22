<?php

namespace App\Http\Controllers\TimeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\CustomDelayPenaltiesDataTable;
use App\CustomDelayPenalty;
class CustomDelayPenalties extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CustomDelayPenaltiesDataTable $datatable)
    {
        return $datatable->render('time_management.custom_delay_penalties.index');
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

    public function store(Request $request)
    {
        $this->validate($request,[
            'administration_id' => 'required|unique:custom_delay_penalties',
            'minute_deduction' => 'required|numeric'
        ]);
   CustomDelayPenalty::create([
    'administration_id' => $request->administration_id,
    'minute_deduction' => $request->minute_deduction
]);
return  redirect()->back()->with('success','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $custom = CustomDelayPenalty::findOrFail($id);
        return response()->json(['data' => $custom]);
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'administration_id' => 'required',
            'minute_deduction' => 'required|numeric'
        ]);
CustomDelayPenalty::where('id' , $id)->update([
    'administration_id' => $request->administration_id,
    'minute_deduction' => $request->minute_deduction
]);

return  redirect()->back()->with('success','success');
    }

    public function destroy($id)
    {
        $custom = CustomDelayPenalty::findOrFail($id);
        $custom->delete();
        return  redirect()->back()->with('success','success');
    }
}
