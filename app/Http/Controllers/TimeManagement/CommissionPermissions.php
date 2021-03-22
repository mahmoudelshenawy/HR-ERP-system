<?php

namespace App\Http\Controllers\TimeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CommissionPermission;
use App\DataTables\CommissionPermissionsDataTable;

class CommissionPermissions extends Controller
{

    public function index(CommissionPermissionsDataTable $datatable)
    {
        return $datatable->render('time_management.commission_permissions.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required|numeric',
            'from' => 'required',
            'to' => 'required',
        ]);

        $request_all = $request->all();
        CommissionPermission::create($request_all);
        return  redirect()->back()->with('success', 'success');
    }

    public function show($id)
    {
        $commission = CommissionPermission::findOrFail($id);
        return response()->json(['data' => $commission]);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_id' => 'required|numeric',
            'from' => 'required',
            'to' => 'required',
        ]);


        CommissionPermission::where('id', $id)->update([
            'employee_id' => $request->employee_id,
            'from' => $request->from,
            'to' => $request->to,
        ]);
        return  redirect()->back()->with('success', 'success');
    }


    public function destroy($id)
    {
        $commission = CommissionPermission::findOrFail($id);
        $commission->delete();
        return  redirect()->back()->with('success', 'success');
    }
}
