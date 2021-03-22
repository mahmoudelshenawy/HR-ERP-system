<?php

namespace App\Http\Controllers\TimeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GracePeriod;
use App\DataTables\GracePeriodDataTable;

class GracePeriods extends Controller
{

    public function index(GracePeriodDataTable $datatable)
    {
        return $datatable->render('time_management.grace_period.index');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'minutes' => 'required|numeric'
        ]);

        GracePeriod::create([
            'minutes' => $request->minutes
        ]);

        return  redirect()->back()->with('success', 'success');
    }


    public function show($id)
    {
        $grace = GracePeriod::findOrFail($id);
        return response()->json(['data' => $grace]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'minutes' => 'required|numeric'
        ]);

        GracePeriod::where('id', $id)->update([
            'minutes' => $request->minutes
        ]);

        return  redirect()->back()->with('success', 'success');
    }

    public function destroy($id)
    {
        $grace = GracePeriod::findOrFail($id);
        $grace->delete();
        return  redirect()->back()->with('success', 'success');
    }
}
