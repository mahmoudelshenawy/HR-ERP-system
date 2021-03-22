<?php

namespace App\Http\Controllers\TimeManagement;

use App\DataTables\EmployeeAttendanceRulesDataTable;
use App\EmployeeAttendanceRule;
use App\EmployeeGeneralData;
use App\Http\Controllers\Controller;
use App\Imports\EmployeeAttendanceRulesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceRules extends Controller
{
    //
    public function index(){
        if (request()->ajax()) {
            $employee_id = request()->employee_id;
            $day = request()->day;
            $month = request()->month;
            if (request()->day){
                $rules = EmployeeAttendanceRule::where('employee_id',$employee_id)
                    ->where('day', 'like', '%' .$day . '%')->paginate(10);
            }else{
                $rules = EmployeeAttendanceRule::where('employee_id',$employee_id)
                    ->where('day', 'like', '%' .date('m') . '%')->paginate(10);
            }

            $html =  view('time_management.attendance_rules.filter_result.index',compact(['rules']))->render();
            return response()->json(['html'=>$html]);
        }
        $rules = EmployeeAttendanceRule::paginate(10);
        return view('time_management.attendance_rules.index',compact('rules'));
    }


    public function import(Request $request){
        $this->validate($request,[
            'attendance_rules'=>'required|mimes:xls,xlsx',
        ]);
        Excel::import(new EmployeeAttendanceRulesImport(),$request->attendance_rules);
        return redirect()->back()->with('success','تم الأستيراد بنجاح');
    }
}
