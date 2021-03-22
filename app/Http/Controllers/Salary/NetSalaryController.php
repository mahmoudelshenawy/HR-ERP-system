<?php

namespace App\Http\Controllers\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\NetSalaryDataTable;
use App\NetSalary;
use App\EmployeeGeneralData;
use App\Advance;
use App\Allowance;
use App\Commission;
use App\OverTime;
use App\AbsenceDelayPenalty;
use App\EmployeeAllowance;
use App\EmployeeDeduction;

class NetSalaryController extends Controller
{

    public function calculate_net_salaries(Request $request)
    {
        // get the current month
        $currentMonth = date('m');
        $month = $request->month;
        // $month = strval($month);
        // check if this month is in the future
        if ($month >  $currentMonth) {

            return redirect()->back()->with('error', trans('salary.future_month'));
        }
        $employees = EmployeeGeneralData::where('statue', 'active')->where('id', '!=', 1)->where('basic_salary', '!=', NULL)->get();
        $over_time_salary = OverTime::where('month', '=', $month)->where('employee_id', '!=', 1)->get();
        $allowance_salary = Allowance::where('month', $month)->where('employee_id', '!=', 1)->get();
        $advanceSalary = Advance::where('month', $month)->where('employee_id', '!=', 1)->get();
        $commissionSalary = Commission::where('month', $month)->where('employee_id', '!=', 1)->get();
        $absenceDelayPenalty = AbsenceDelayPenalty::where('month', $month)->where('employee_id', '!=', 1)->get();

        // check if the netSalary for this month has been created yet
        $calculatedNetSalary = NetSalary::where('month', $currentMonth)->first();
        if (!$calculatedNetSalary) {


            // calculate the net salary for the active employees
            foreach ($employees as $employee) {
                $netSalary = new NetSalary();
                $netSalary->employee_id = $employee->id;
                $netSalary->month = $month;
                $netSalary->basic_salary = $employee->basic_salary ?? 0;
                $netSalary->variable_salary = $employee->variable_pay ?? 0;
                $netSalary->net_salary = $employee->basic_salary + $employee->variable_pay + $employee->housing_allowance + $employee->clothing_allowance + $employee->food_allowance + $employee->mobile_allowance + $employee->gas_allowance + $employee->car_allowance - $employee->insurance_deduct ;
                // get the allowance of the employee if exists
                $employee_allowance = EmployeeAllowance::where('employee_id', '=', $employee->id)->get();
                // get the deduction of the employee if exists
                $employee_deduction = EmployeeDeduction::where('employee_id', '=', $employee->id)->get();

                if (count($employee_allowance) > 0) {
                    foreach ($employee_allowance as $allowance) {
                        $netSalary->employee_allowance += $allowance->allowance_amount;
                        $netSalary->net_salary += $allowance->allowance_amount;
                    }
                }
                if (count($employee_deduction) > 0) {
                    foreach ($employee_deduction as $deduction) {
                        $netSalary->employee_deduction += $deduction->deduction_amount;
                        $netSalary->net_salary -= $deduction->deduction_amount;
                    }
                }

                if (count($over_time_salary) > 0) {
                    foreach ($over_time_salary as $over) {
                        if ($over->employee_id == $employee->id) {
                            $netSalary->overtime = $over->over_time_amount;

                            $netSalary->net_salary += $over->over_time_amount;
                        }
                    }
                }
                if (count($allowance_salary) > 0) {
                    foreach ($allowance_salary as $allow) {
                        if ($allow->employee_id == $employee->id) {
                            $netSalary->allowance = $allow->allowance_amount;

                            $netSalary->net_salary += $allow->allowance_amount;
                        }
                    }
                }
                if (count($advanceSalary) > 0) {
                    foreach ($advanceSalary as $advance) {
                        if ($advance->employee_id == $employee->id) {
                            $netSalary->advance = $advance->advance_amount;
                            $netSalary->net_salary += $advance->advance_amount;
                        }
                    }
                }
                if (count($commissionSalary) > 0) {
                    foreach ($commissionSalary as $commission) {
                        if ($commission->employee_id == $employee->id) {
                            $netSalary->commission = $commission->commission_amount;

                            $netSalary->net_salary += $commission->commission_amount;
                        }
                    }
                }
                if (count($absenceDelayPenalty) > 0) {
                    foreach ($absenceDelayPenalty as $penalty) {
                        if ($penalty->employee_id == $employee->id) {
                            $netSalary->delay_penalty = $penalty->delay_subtract;
                            $netSalary->absence_penalty = $penalty->absence_subtract;

                            $netSalary->net_salary = $netSalary->net_salary - ($penalty->delay_subtract + $penalty->absence_subtract);
                        }
                    }
                }
                $netSalary->save();
                continue;
            }
        }

        return redirect()->back()->with('success', 'success');
    }

    public function index(NetSalaryDataTable $datatable)
    {
        $currentMonth = date('m');
        $slaries_is_calculated = NetSalary::where('month', $currentMonth)->first();
        $not_calculated = false;
        if (!$slaries_is_calculated) {
            $not_calculated = true;
            return view('salary.net_salary.index', compact('not_calculated'));
        }
        return $datatable->render('salary.net_salary.index_datatable');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
