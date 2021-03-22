<?php

namespace App\Http\Controllers\BusinessSetup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FixedDeduction;
use App\DataTables\FixedDeductionDataTable;

class FixedDeductionController extends Controller
{

    public function index(FixedDeductionDataTable $datatable)
    {
        return $datatable->render('business-setup.fixed_deduction.index');
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

        FixedDeduction::create([
            'name' => $request->name
        ]);

        return  redirect()->back()->with('success', 'success');
    }


    public function show($id)
    {
        $allowance = FixedDeduction::findOrFail($id);
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

        FixedDeduction::where('id', $id)->update([
            'name' => $request->name
        ]);

        return  redirect()->back()->with('success', 'success');
    }

    public function destroy($id)
    {
        $allowance = FixedDeduction::findOrFail($id);
        $allowance->delete();
        return  redirect()->back()->with('success', 'success');
    }
}
