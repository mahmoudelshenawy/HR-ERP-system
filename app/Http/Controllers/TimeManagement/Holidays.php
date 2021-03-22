<?php

namespace App\Http\Controllers\TimeManagement;

use App\DataTables\HolidaysDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Holiday;
use Yajra\DataTables\Facades\DataTables;

class Holidays extends Controller
{

    public function index(HolidaysDatatable $datatable)
    {
        return $datatable->render('time_management.holidays.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'date' => 'required'
        ]);

        Holiday::create($data);
        session()->flash('success', __('record has been created'));
        return back();
    }

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
        $holiday = Holiday::findOrFail($id);
        return $holiday;
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
            'date' => 'required'
        ]);

        Holiday::where('id', $id)->update($data);

        session()->flash('success', __('record has been updated'));
        return back();
    }

    public function destroy($id)
    {
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();
        session()->flash('success', __('record has been deleted'));
        return back();
    }
}
