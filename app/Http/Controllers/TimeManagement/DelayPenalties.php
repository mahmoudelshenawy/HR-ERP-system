<?php

namespace App\Http\Controllers\TimeManagement;

use App\BusinessBranch;
use App\DataTables\DelayPenaltiesDataTable;
use App\DelayPenalty;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class DelayPenalties extends Controller
{


    public function index(DelayPenaltiesDataTable $dataTable)
    {
        if (request()->ajax() && request()->has('max_penalty_option')) {
            $max_penalty_option = request()->max_penalty_option;
            return response()->json(['max_penalty_option' => $max_penalty_option]);
        }
        return $dataTable->render('time_management.delay_penalties.index');
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
            'delay_minutes' => 'required|numeric',
            'penalty_first_time' => 'required|numeric',
            'penalty_second_time' => 'required|numeric',
            'penalty_third_time' => 'required|numeric',
            'penalty_fourth_time' => 'required|numeric',
        ], [], [
            'delay_minutes' => __('time_management.delay_minutes'),
        ]);
        DelayPenalty::create([
            'delay_minutes' => $request->delay_minutes,
            'penalty_first_time' => $request->penalty_first_time,
            'penalty_second_time' => $request->penalty_second_time,
            'penalty_third_time' => $request->penalty_third_time,
            'penalty_fourth_time' => $request->penalty_fourth_time,
        ]);

        return  redirect()->back()->with('success', 'success');
    }

    public function show($id)
    {
        $delay_penalty = DelayPenalty::findOrFail($id);
        return response()->json([
            'data' => $delay_penalty
        ]);
    }

    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'delay_minutes' => 'required|numeric',
            'penalty_first_time' => 'required|numeric',
            'penalty_second_time' => 'required|numeric',
            'penalty_third_time' => 'required|numeric',
            'penalty_fourth_time' => 'required|numeric',
        ], [], [
            'delay_minutes' => __('time_management.delay_minutes'),
        ]);
        DelayPenalty::where('id', $id)->update([
            'delay_minutes' => $request->delay_minutes,
            'penalty_first_time' => $request->penalty_first_time,
            'penalty_second_time' => $request->penalty_second_time,
            'penalty_third_time' => $request->penalty_third_time,
            'penalty_fourth_time' => $request->penalty_fourth_time,
        ]);

        return  redirect()->back()->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penalty = DelayPenalty::find($id);
        $penalty->delete();
        session()->flash('success', __('general.deleted_success'));
        return back();
    }
}
