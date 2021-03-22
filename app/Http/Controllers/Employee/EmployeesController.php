<?php

namespace App\Http\Controllers\Employee;

use App\BusinessBranch;
use App\BusinessJob;
use App\DataTables\EmployeesListDatatable;
use App\EmployeeGeneralData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\EmployeeAllowance;
use App\EmployeeDeduction;

class EmployeesController extends Controller
{
    private function get_branch_jobs()
    {
        return  \DB::table('business_branches')
            ->join('business_administrations', 'business_branches.id', '=', 'business_administrations.business_branche_id')
            ->join('business_departments', 'business_administrations.id', '=', 'business_departments.business_administration_id')
            ->join('business_jobs', 'business_departments.id', '=', 'business_jobs.business_department_id')
            ->select('business_departments.name')
            ->get();
    }

    private function get_branch_department($branch_id)
    {
        return  \DB::table('business_branches')
            ->join('business_administrations', 'business_branches.id', '=', 'business_administrations.business_branche_id')
            ->join('business_departments', 'business_administrations.id', '=', 'business_departments.business_administration_id')
            ->where('business_branches.id', '=', $branch_id)
            ->select('business_departments.*')
            ->get();
    }


    private function rules_general_data($id)
    {
        return $rules =  [
            'employee_code' => 'unique:employee_general_data,code,' . $id,
            'employee_name' => 'Required|max:150|Unique:employee_general_data,employee_name,' . $id,
            'employee_name_en' => 'nullable||max:150|Unique:employee_general_data,employee_name_en,' . $id,
            'employee_short_name' => 'nullable|max:20|Unique:employee_general_data,employee_short_name,' . $id,
            'employee_img' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048|max:2048',
            'gender' => 'nullable',
            'phone_1' => 'nullable|numeric|digits_between:7,15|Unique:employee_general_data,phone_1,' . $id,
            'phone_2' => 'nullable|numeric|digits_between:7,15|Unique:employee_general_data,phone_2,' . $id,
            'email' => 'nullable|email|max:50|unique:employee_general_data,email,' . $id,
            'religion' => 'max:10',
            'birth_place' => 'max:30',
            'national_id_number' => 'nullable|alpha_dash|max:25',
            'national_id_expiry_date' => 'nullable|string',
            'national_id_file' => 'nullable|file|mimes:pdf|max:2048',
            'passport_file' => 'nullable|file|mimes:pdf|max:2048',
            'residency_file' => 'nullable|file|mimes:pdf|max:2048',
            'residency_number' => 'nullable|digits_between:7,20|max:30',
            'residency_start_date' => 'nullable|string',
            'residency_expiry_date' => 'nullable|string',
            'passport_number' => 'nullable|alpha_dash|max:25',
            'passport_start_date' => 'nullable',
            'passport_expiry_date' => 'nullable|',
            'driving_licence_number' => 'nullable|alpha_dash|max:30',
            'driving_licence_expiry_date' => 'nullable',
            'driving_licence_file' => 'nullable|file|mimes:pdf|max:2048',
            'healthy_certificate_number' => 'nullable|alpha_dash|max:30',
            'healthy_certificate_expiry_date' => 'nullable|string',
            'educational_qualification' => 'nullable|max:50|string',
            'educational_qualification_year' => 'nullable|string',
            'educational_qualification_file' => 'nullable|file|mimes:pdf|max:2048',
            'residency_job' => 'nullable|string|max:50',
            'job_id' => 'nullable',
            'contract_type' => 'nullable',
            'basic_salary' => 'nullable|numeric',
            'variable_pay' => 'nullable|numeric',
            'manager_id' => 'nullable',
            'hiring_date' => 'nullable|string',
            'contract_starting_date' => 'nullable|string',
            'contract_ending_date' => 'nullable|string',
            'annual_vacation_days_per_year' => 'nullable|numeric|max:360',
            'end_service_reward_days_per_year' => 'nullable|numeric|max:360',
            'medical_insurance_type' => 'nullable',
            'medical_insurance_number' => 'nullable|numeric||Unique:employee_general_data,medical_insurance_number,' . $id,
            'medical_insurance_start_data' => 'nullable|string',
            'medical_insurance_end_data' => 'nullable|string',
            'employee_social_insurance_number' => 'nullable|numeric||Unique:employee_general_data,employee_social_insurance_number,' . $id,
            'employee_account_number' => 'nullable|numeric',
            'employee_bank_account_name' => 'nullable|max:50',

        ];
    }


    private function fileHandeler(Request $request, $input, $path)
    {
        if ($request->hasFile($input)) {
            $name = time() . '_' . $request->$input->getClientOriginalName();
            $request->$input->move(public_path('uploads/files/employees/code/' . $path), $name);
            return $name;
        }
    }


    public function index(EmployeesListDatatable $datatable)
    {
        $employeeData = EmployeeGeneralData::where('statue', 'active')->paginate(12);
        if (request()->ajax()) {
            $branch = request()->branch;
            $name = request()->name;
            $code = request()->code;
            if ($branch) {
                $employeeData = EmployeeGeneralData::where('statue', 'active')
                    ->where('branch_id', $branch)
                    ->where('employee_name', 'like', '%' . $name . '%')
                    ->where('code', 'like', '%' . $code . '%')
                    ->paginate(12);
            } else {
                $employeeData = EmployeeGeneralData::where('statue', 'active')
                    ->where('employee_name', 'like', '%' . $name . '%')
                    ->where('code', 'like', '%' . $code . '%')
                    ->paginate(12);
            }
            $branches = BusinessBranch::get();
            $html =  view('employees.filter_result.index', compact(['employeeData']))->render();
            return response()->json(['html' => $html]);
        } else {
            return view('employees.index', compact(['employeeData']));
        }
    }

    public function employees_list(EmployeesListDatatable $datatable)
    {
        return  $datatable->render('employees.employees_list.index');
    }

    public function add(Request $request)
    {
        $branch = $request->branch;
        $jobs = $this->get_branch_jobs();
        $department = $this->get_branch_department($branch);
        $files = ['national_id_file', 'passport_file', 'residence_file', 'driving_licence_file', 'healthy_certificate_file', 'educational_qualification_file', 'cv'];
        return view('employees.add_employee', compact(['branch', 'jobs', 'department', 'files']));
    }



    public function post_add(Request $request)
    {
        //
        $employee_personal_data = new EmployeeGeneralData();
        $validator = Validator::make($request->all(), $this->rules_general_data($employee_personal_data->id));
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $employee_personal_data->branch_id = $request->branch_id;
        $employee_personal_data->code = $request->employee_code;
        $employee_personal_data->employee_name = $request->employee_name;
        $employee_personal_data->employee_name_en = $request->employee_name_en;
        $employee_personal_data->employee_short_name = $request->employee_short_name;
        if ($request->has('employee_img')) {
            $employee_personal_data->employee_img = $this->fileHandeler($request, 'employee_img', $request->employee_code);
        }
        $employee_personal_data->gender = $request->gender;
        $employee_personal_data->email = $request->email;
        $employee_personal_data->address = $request->address;
        $employee_personal_data->phone_1 = $request->phone_1;
        $employee_personal_data->phone_2 = $request->phone_2;
        $employee_personal_data->religion = $request->religion;
        $employee_personal_data->country_id = $request->country_id;
        $employee_personal_data->birth_place = $request->birth_place;
        $employee_personal_data->birth_date = $request->birth_date;
        $employee_personal_data->guarantor_id = $request->guarantor_id;
        $employee_personal_data->passport_number = $request->passport_number;
        $employee_personal_data->passport_start_date =  $request->passport_start_date;
        $employee_personal_data->passport_expiry_date = $request->passport_expiry_date;
        $employee_personal_data->passport_file = $this->fileHandeler($request, 'passport_file', $employee_personal_data->code);
        $employee_personal_data->national_id_number = $request->national_id_number;
        $employee_personal_data->national_id_expiry_date = $request->national_id_expiry_date;
        $employee_personal_data->residency_number = $request->residency_number;
        $employee_personal_data->residency_start_date = $request->residency_start_date;
        $employee_personal_data->residency_expiry_date = $request->residency_expiry_date;
        $employee_personal_data->residency_job = $request->residency_job;
        $employee_personal_data->national_id_file = $this->fileHandeler($request, 'national_id_file', $employee_personal_data->code);
        $employee_personal_data->residency_file = $this->fileHandeler($request, 'residence_file', $employee_personal_data->code);
        $employee_personal_data->driving_licence_number = $request->driving_licence_number;
        $employee_personal_data->driving_licence_expiry_date = $request->driving_licence_expiry_date;
        $employee_personal_data->driving_licence_file = $this->fileHandeler($request, 'driving_licence_file', $employee_personal_data->code);
        $employee_personal_data->healthy_certificate_file = $this->fileHandeler($request, 'healthy_certificate_file', $employee_personal_data->code);
        $employee_personal_data->educational_qualification_file = $this->fileHandeler($request, 'educational_qualification_file', $employee_personal_data->code);
        $employee_personal_data->cv = $this->fileHandeler($request, 'cv', $employee_personal_data->code);
        $employee_personal_data->healthy_certificate = $request->healthy_certificate_number;
        $employee_personal_data->healthy_certificate_notice = $request->healthy_certificate_notice;
        $employee_personal_data->healthy_certificate_expiry_date = $request->healthy_certificate_expiry_date;
        $employee_personal_data->healthy_certificate_cancel_date = $request->healthy_certificate_cancel_date;
        $employee_personal_data->educational_qualification = $request->educational_qualification;
        $employee_personal_data->educational_qualification_year = $request->educational_qualification_year;
        $employee_personal_data->educational_university = $request->educational_university;
        $employee_personal_data->experience = $request->experience;

        if ($request->has('end_service_reward')) {
            if ($request->end_service_reward == "on" || $request->end_service_reward  = 1) {
                $employee_personal_data->end_service_reward = 1;
            } elseif ($request->end_service_reward == null) {
                $employee_personal_data->end_service_reward = 0;
            }
        } else {
            $employee_personal_data->end_service_reward = 0;
        }
        if ($request->has('annual_vacation')) {
            if ($request->annual_vacation == "on" || $request->annual_vacation = 1) {
                $employee_personal_data->annual_vacation = 1;
            } elseif ($request->annual_vacation == null) {
                $employee_personal_data->annual_vacation = 0;
            }
        } else {
            $employee_personal_data->annual_vacation = 0;
        }
        if ($request->has('attendable')) {
            if ($request->attendable == "on" || $request->attendable = 1) {
                $employee_personal_data->attendable = 1;
            } elseif ($request->attendable == null) {
                $employee_personal_data->attendable = 0;
            }
        } else {
            $employee_personal_data->attendable  = 0;
        }
        if ($request->has('employee_medical_insurance_statue')) {
            if ($request->employee_medical_insurance_statue == "on" || $request->employee_medical_insurance_statue  = 1) {
                $employee_medical_insurance_statue = 1;
            } elseif ($request->employee_medical_insurance_statue == null) {
                $employee_medical_insurance_statue = 0;
            }
        } else {
            $employee_medical_insurance_statue = 0;
        }
        if ($request->has('employee_social_insurance_statue')) {
            if ($request->employee_social_insurance_statue == "on" || $request->employee_social_insurance_statue  = 1) {
                $employee_personal_data->employee_social_insurance_statue = 1;
            } elseif ($request->employee_social_insurance_statue == null || $request->employee_social_insurance_statue == 0 || $request->employee_social_insurance_statue == 'of') {
                $employee_personal_data->employee_social_insurance_statue = 0;
            }
        } else {
            $employee_personal_data->employee_social_insurance_statue = 0;
        }
        //work data
        $employee_personal_data->job_id = $request->job_id;
        $employee_personal_data->contract_types_id  = $request->contract_types_id;
        $employee_personal_data->hiring_date  = $request->hiring_date;
        $employee_personal_data->contract_starting_date  = $request->contract_starting_date;
        $employee_personal_data->contract_ending_date  = $request->contract_ending_date;
        $employee_personal_data->manager_id  = $request->manager_id;
        $employee_personal_data->basic_salary  = $request->basic_salary;
        $employee_personal_data->variable_pay = $request->variable_pay;
        $employee_personal_data->annual_vacation_days_per_year = $request->annual_vacation_days_per_year;
        $employee_personal_data->end_service_reward_days_per_year = $request->end_service_reward_days_per_year;


        $employee_personal_data->employee_medical_insurance_statue = $employee_medical_insurance_statue;
        $employee_personal_data->medical_insurance_id = $request->medical_insurance_id;
        $employee_personal_data->medical_insurance_number = $request->medical_insurance_number;
        $employee_personal_data->medical_insurance_start_data = $request->medical_insurance_start_data;
        $employee_personal_data->medical_insurance_end_data = $request->medical_insurance_end_data;

        $employee_personal_data->employee_social_insurance_number = $request->employee_social_insurance_number;
        $employee_personal_data->socialinsurance_join_date = $request->socialinsurance_join_date;
        $employee_personal_data->socialinsurance_end_date = $request->socialinsurance_end_date;

        $employee_personal_data->bank_id = $request->employee_bank_id;
        $employee_personal_data->employee_account_number = $request->employee_account_number;
        $employee_personal_data->employee_bank_account_name = $request->employee_bank_account_name;
        $employee_personal_data->save();
        return redirect('employees/list')->with('success', 'success');
    }


    public function show($id)
    {


        $employee = EmployeeGeneralData::find($id);
        $department = $this->get_branch_department($employee->branch_id);
        //name->fixed_allowanca
        //name->fixed_deduction
        //amount->
        $employee_allowances = EmployeeAllowance::where('employee_id', $id)->get();
        $employee_deductions = EmployeeDeduction::where('employee_id', $id)->get();

        return view('employees.show_employee', compact(['employee', 'department', 'employee_allowances', 'employee_deductions']));
    }

    /*public function edit($id)
    {
        $employee = EmployeeGeneralData::find($id);
        $jobs = $this->get_branch_jobs();
        $department = $this->get_branch_department($employee->branch_id);
        return view('employees.edit',compact(['employee','jobs','jobs2','department']));
    }*/

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules_general_data($id));
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $employee_personal_data =  EmployeeGeneralData::find($id);
        $employee_personal_data->branch_id = $request->branch_id;
        $employee_personal_data->code = $request->employee_code;
        $employee_personal_data->employee_name = $request->employee_name;
        $employee_personal_data->employee_name_en = $request->employee_name_en;
        $employee_personal_data->employee_short_name = $request->employee_short_name;
        if ($request->has('employee_img')) {
            $employee_personal_data->employee_img = $this->fileHandeler($request, 'employee_img', $request->employee_code);
        }
        $employee_personal_data->gender = $request->gender;
        $employee_personal_data->email = $request->email;
        $employee_personal_data->address = $request->address;
        $employee_personal_data->phone_1 = $request->phone_1;
        $employee_personal_data->phone_2 = $request->phone_2;
        $employee_personal_data->religion = $request->religion;
        $employee_personal_data->country_id = $request->country_id;
        $employee_personal_data->birth_place = $request->birth_place;
        $employee_personal_data->birth_date = $request->birth_date;
        $employee_personal_data->guarantor_id = $request->guarantor_id;
        $employee_personal_data->passport_number = $request->passport_number;
        $employee_personal_data->passport_start_date =  $request->passport_start_date;
        $employee_personal_data->passport_expiry_date = $request->passport_expiry_date;
        $employee_personal_data->passport_file = $this->fileHandeler($request, 'passport_file', $employee_personal_data->code);
        $employee_personal_data->national_id_number = $request->national_id_number;
        $employee_personal_data->national_id_expiry_date = $request->national_id_expiry_date;
        $employee_personal_data->residency_number = $request->residency_number;
        $employee_personal_data->residency_start_date = $request->residency_start_date;
        $employee_personal_data->residency_expiry_date = $request->residency_expiry_date;
        $employee_personal_data->residency_job = $request->residency_job;
        $employee_personal_data->national_id_file = $this->fileHandeler($request, 'national_id_file', $employee_personal_data->code);
        $employee_personal_data->residency_file = $this->fileHandeler($request, 'residency_file', $employee_personal_data->code);
        $employee_personal_data->driving_licence_number = $request->driving_licence_number;
        $employee_personal_data->driving_licence_expiry_date = $request->driving_licence_expiry_date;
        $employee_personal_data->driving_licence_file = $this->fileHandeler($request, 'driving_licence_file', $employee_personal_data->code);
        $employee_personal_data->healthy_certificate_file = $this->fileHandeler($request, 'healthy_certificate_file', $employee_personal_data->code);
        $employee_personal_data->educational_qualification_file = $this->fileHandeler($request, 'educational_qualification_file', $employee_personal_data->code);
        $employee_personal_data->cv = $this->fileHandeler($request, 'cv', $employee_personal_data->code);
        $employee_personal_data->healthy_certificate = $request->healthy_certificate_number;
        $employee_personal_data->healthy_certificate_notice = $request->healthy_certificate_notice;
        $employee_personal_data->healthy_certificate_expiry_date = $request->healthy_certificate_expiry_date;
        $employee_personal_data->healthy_certificate_cancel_date = $request->healthy_certificate_cancel_date;
        $employee_personal_data->educational_qualification = $request->educational_qualification;
        $employee_personal_data->educational_qualification_year = $request->educational_qualification_year;
        $employee_personal_data->educational_university = $request->educational_university;
        $employee_personal_data->experience = $request->experience;

        $end_service_reward = 0;
        $annual_vacation = 0;
        $attendable = 0;
        $employee_social_insurance_statue = 0;
        $employee_medical_insurance_statue = 0;
        if ($request->has('end_service_reward')) {
            if ($request->end_service_reward == "on" || $request->end_service_reward  = 1) {
                $employee_personal_data->end_service_reward = 1;
            } elseif ($request->end_service_reward == null) {
                $employee_personal_data->end_service_reward = 0;
            }
        } else {
            $employee_personal_data->end_service_reward = 0;
        }
        if ($request->has('annual_vacation')) {
            if ($request->annual_vacation == "on" || $request->annual_vacation = 1) {
                $employee_personal_data->annual_vacation = 1;
            } elseif ($request->annual_vacation == null) {
                $employee_personal_data->annual_vacation = 0;
            }
        } else {
            $employee_personal_data->annual_vacation = 0;
        }
        if ($request->has('attendable')) {
            if ($request->attendable == "on" || $request->attendable = 1) {
                $employee_personal_data->attendable = 1;
            } elseif ($request->attendable == null) {
                $employee_personal_data->attendable = 0;
            }
        } else {
            $employee_personal_data->attendable  = 0;
        }
        if ($request->has('employee_medical_insurance_statue')) {
            if ($request->employee_medical_insurance_statue == "on" || $request->employee_medical_insurance_statue  = 1) {
                $employee_personal_data->employee_medical_insurance_statue = 1;
            } elseif ($request->employee_medical_insurance_statue == null) {
                $employee_personal_data->employee_medical_insurance_statue = 0;
            }
        } else {
            $employee_personal_data->employee_medical_insurance_statue = 0;
        }
        if ($request->has('employee_social_insurance_statue')) {
            if ($request->employee_social_insurance_statue == "on" || $request->employee_social_insurance_statue  = 1) {
                $employee_personal_data->employee_social_insurance_statue = 1;
            } elseif ($request->employee_social_insurance_statue == null || $request->employee_social_insurance_statue == 0 || $request->employee_social_insurance_statue == 'of') {
                $employee_personal_data->employee_social_insurance_statue = 0;
            }
        } else {
            $employee_personal_data->employee_social_insurance_statue = 0;
        }
        $employee_personal_data->insurance_basic = $request->insurance_basic;
        $employee_personal_data->insurance_variable = $request->insurance_variable;

        //work data
        $employee_personal_data->job_id = $request->job_id;
        $employee_personal_data->contract_types_id  = $request->contract_types_id;
        $employee_personal_data->hiring_date  = $request->hiring_date;
        $employee_personal_data->contract_starting_date  = $request->contract_starting_date;
        $employee_personal_data->contract_ending_date  = $request->contract_ending_date;
        $employee_personal_data->manager_id  = $request->manager_id;
        $employee_personal_data->basic_salary  = $request->basic_salary;
        $employee_personal_data->variable_pay = $request->variable_pay;
        $employee_personal_data->annual_vacation_days_per_year = $request->annual_vacation_days_per_year;
        $employee_personal_data->end_service_reward_days_per_year = $request->end_service_reward_days_per_year;


        $employee_personal_data->medical_insurance_id = $request->medical_insurance_id;
        $employee_personal_data->medical_insurance_number = $request->medical_insurance_number;
        $employee_personal_data->medical_insurance_type = $request->medical_insurance_type;
        $employee_personal_data->medical_insurance_start_data = $request->medical_insurance_start_data;
        $employee_personal_data->medical_insurance_end_data = $request->medical_insurance_end_data;

        $employee_personal_data->employee_social_insurance_number = $request->employee_social_insurance_number;
        $employee_personal_data->socialinsurance_join_date = $request->socialinsurance_join_date;
        $employee_personal_data->socialinsurance_end_date = $request->socialinsurance_end_date;

        $employee_personal_data->bank_id = $request->employee_bank_id;
        $employee_personal_data->employee_account_number = $request->employee_account_number;
        $employee_personal_data->employee_bank_account_name = $request->employee_bank_account_name;
        $employee_personal_data->housing_allowance = $request->housing_allowance;
        $employee_personal_data->clothing_allowance = $request->clothing_allowance;
        $employee_personal_data->food_allowance = $request->food_allowance;
        $employee_personal_data->mobile_allowance = $request->mobile_allowance;
        $employee_personal_data->gas_allowance = $request->gas_allowance;
        $employee_personal_data->car_allowance = $request->car_allowance;
        $employee_personal_data->insurance_deduct = $request->insurance_deduct;
        $employee_personal_data->save();
        return redirect()->back()->with('success', 'success');
    }

    public function print($id)
    {

        $employee = EmployeeGeneralData::find($id);
        $department = $this->get_branch_department($employee->branch_id);
        return view('employees.employee_profile_parts.print_profile', compact(['employee', 'department']));
    }
}
