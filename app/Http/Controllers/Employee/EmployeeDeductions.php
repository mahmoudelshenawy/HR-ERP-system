<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmployeeDeduction;

class EmployeeDeductions extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'deduction_id' => 'required',
            'deduction_amount' => 'required|numeric'
        ]);

        EmployeeDeduction::create([
            'employee_id' => $request->employee_id,
            'deduction_id' => $request->deduction_id,
            'deduction_amount' => $request->deduction_amount
        ]);

        return redirect()->back()->with('success', 'success');
    }
    public function show($id)
    {
        $deduction = EmployeeDeduction::findOrFail($id);
        return response()->json(['data' => $deduction]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'deduction_id' => 'required',
            'deduction_amount' => 'required|numeric'
        ]);

        EmployeeDeduction::where('id', $id)->update([
            'employee_id' => $request->employee_id,
            'deduction_id' => $request->deduction_id,
            'deduction_amount' => $request->deduction_amount
        ]);

        return redirect()->back()->with('success', 'success');
    }

    public function destroy($id)
    {
        $deduction = EmployeeDeduction::findOrFail($id);
        $deduction->delete();
        return redirect()->back()->with('success', 'success');
    }
}
