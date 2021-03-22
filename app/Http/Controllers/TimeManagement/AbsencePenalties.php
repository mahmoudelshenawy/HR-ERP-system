<?php

namespace App\Http\Controllers\TimeManagement;

use App\AbsencePenalty;
use App\DataTables\AbsencePenaltiesDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsencePenalties extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AbsencePenaltiesDataTable $dataTable)
    {
        if (request()->ajax() && request()->has('max_penalty_option')){
            $max_penalty_option = request()->max_penalty_option;
            return response()->json(['max_penalty_option'=>$max_penalty_option]);
        }
        return $dataTable->render('time_management.absence_penalties.index');
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
        $this->validate($request, [
            'count' => 'required',
            'penalty' => 'required',

        ],[],[
            'count'=>__('time_management.delay_count'),
            'penalty'=>__('time_management.delay_deduct'),
        ]);
        foreach (AbsencePenalty::all() as $old_penalty){
            if (in_array($old_penalty->branch_id,$request->branch_id) && $old_penalty->delay_minutes == $request->delay_minutes){
                return redirect()->back()->with('error',__('general.record_exist'));
            }
        }
        foreach ($request->branch_id as $branch){
            $penalty = new AbsencePenalty();
            $penalty->branch_id  = $branch;
            $penalty->count  = $request->count;
            $penalty->penalty  = $request->penalty;
            $penalty->max_penalty  = $request->max_penalty;
            $penalty->save();
        }

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penalty = AbsencePenalty::find($id);
        $penalty->delete();
        session()->flash('success', __('general.deleted_success'));
        return back();
    }
}
