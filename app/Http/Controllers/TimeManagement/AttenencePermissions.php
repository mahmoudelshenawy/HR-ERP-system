<?php

namespace App\Http\Controllers\TimeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AttendencePermission;
use App\DataTables\AttendencePermissionsDataTable;

class AttenencePermissions extends Controller
{

    public function index(AttendencePermissionsDataTable $datatable)
    {
        return $datatable->render('time_management.attendence_permissions.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required|numeric',
            'day' => 'date',
            'from' => 'required',
            'to' => 'required',
            'type' => 'required|in:entrance,leave'
        ]);
        $request_all = $request->all();
        AttendencePermission::create($request_all);
        return  redirect()->back()->with('success', 'success');
    }

    public function show($id)
    {
        $permission = AttendencePermission::findOrFail($id);
        return response()->json(['data' => $permission]);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_id' => 'required|numeric',
            'day' => 'date',
            'from' => 'required',
            'to' => 'required',
            'type' => 'required|in:entrance,leave'
        ]);

        $request_all = $request->all();
        AttendencePermission::where('id', $id)->update([
            'employee_id' => $request->employee_id,
            'day' => $request->day,
            'from' => $request->from,
            'to' => $request->to,
            'type' => $request->type,
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
        $attendence = AttendencePermission::findOrFail($id);
        $attendence->delete();
        return  redirect()->back()->with('success', 'success');
    }
}
