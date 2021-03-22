<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmployeeAllowance;

class EmployeeAllowances extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'allowance_id' => 'required',
            'allowance_amount' => 'required|numeric'
        ]);

        EmployeeAllowance::create([
            'employee_id' => $request->employee_id,
            'allowance_id' => $request->allowance_id,
            'allowance_amount' => $request->allowance_amount
        ]);

        return redirect()->back()->with('success', 'success');
    }

    public function show($id)
    {
        $allowance = EmployeeAllowance::findOrFail($id);
        return response()->json(['data' => $allowance]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'allowance_id' => 'required',
            'allowance_amount' => 'required|numeric'
        ]);

        EmployeeAllowance::where('id', $id)->update([
            'employee_id' => $request->employee_id,
            'allowance_id' => $request->allowance_id,
            'allowance_amount' => $request->allowance_amount
        ]);

        return redirect()->back()->with('success', 'success');
    }

    public function destroy($id)
    {
        $allowance = EmployeeAllowance::findOrFail($id);
        $allowance->delete();
        return redirect()->back()->with('success', 'success');
    }
}
