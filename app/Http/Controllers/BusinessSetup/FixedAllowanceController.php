<?php

namespace App\Http\Controllers\BusinessSetup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FixedAllowance;
use App\DataTables\FixedAllowanceDataTable;

class FixedAllowanceController extends Controller
{

    public function index(FixedAllowanceDataTable $datatable)
    {
        return $datatable->render('business-setup.fixed_allowance.index');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        FixedAllowance::create([
            'name' => $request->name
        ]);

        return  redirect()->back()->with('success', 'success');
    }


    public function show($id)
    {
        $allowance = FixedAllowance::findOrFail($id);
        return response()->json(['data' => $allowance]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        FixedAllowance::where('id', $id)->update([
            'name' => $request->name
        ]);

        return  redirect()->back()->with('success', 'success');
    }

    public function destroy($id)
    {
        $allowance = FixedAllowance::findOrFail($id);
        $allowance->delete();
        return  redirect()->back()->with('success', 'success');
    }
}
