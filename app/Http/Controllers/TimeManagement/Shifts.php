<?php

namespace App\Http\Controllers\TimeManagement;

use App\DataTables\ShiftsDatatable;
use App\Http\Controllers\Controller;
use App\Shift;
use Illuminate\Http\Request;

class Shifts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShiftsDatatable $datatable)
    {
        return $datatable->render('time_management.shifts.index');
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
        $data = $this->validate($request, [
            'name' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'holiday' => 'required',
        ],[],[
            'name' => trans('time_management.shift_name'),
            'check_in' => trans('time_management.check_in'),
            'check_out' => trans('time_management.check_out'),
            'holiday' => trans('time_management.week_holiday'),
        ]);
        Shift::create($data);
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
        $data = $this->validate($request, [
            'name' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'holiday' => 'required',
        ],[],[
            'name' => trans('time_management.shift_name'),
            'check_in' => trans('time_management.check_in'),
            'check_out' => trans('time_management.check_out'),
            'holiday' => trans('time_management.week_holiday'),
        ]);
        Shift::where('id', $id)->update($data);
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
        $shift = Shift::findOrFail($id);
        $shift->delete();
        session()->flash('success', __('record has been deleted'));
        return back();
    }
}
