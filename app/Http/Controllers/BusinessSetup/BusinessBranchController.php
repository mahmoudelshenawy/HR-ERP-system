<?php

namespace App\Http\Controllers\BusinessSetup;

use App\BranchAttendanceRules;
use App\BusinessType;
use App\DataTables\BranchesDatatable;
use App\EmployeeGeneralData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BusinessBranch;
use App\DelayPenalty;
use App\AbsencePenalty;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class BusinessBranchController extends Controller
{
    private function rules($id)
    {
        return $rules =  [
            'type_id' => 'Required',
            'name' => 'Required|max:255|unique:business_branches,name,' . $id,
            'phone' => 'nullable|Numeric|Unique:business_branches,phone,' . $id,
            'email' => 'nullable|Email|Unique:business_branches,email,' . $id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=300,max_height=300',
            'document' => 'nullable|file',
        ];
    }
    private function imgHandeler(Request $request, $input, $path)
    {
        if ($request->hasFile($input)) {
            $name = time() . '.' . $request->$input->getClientOriginalName();
            $request->$input->move(public_path('uploads/files/branches' . $path . '/images'), $name);
            return $name;
        }
    }
    private function docsHandeler(Request $request, $input, $path)
    {
        if ($request->has($input)) {
            $name = time() . '.' . $request->$input->getClientOriginalName();
            $request->$input->move(public_path('uploads/files/branches' . $path . '/documents'), $name);
            return $name;
        }
    }

    public function index(BranchesDatatable $datatable)
    {
        return $datatable->render('business-setup.business-branch.index');
    }



    public function create()
    {
        $days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        $branch = BusinessBranch::with('businessType')->get();
        $businessType = BusinessType::all();
        $employees = EmployeeGeneralData::where('statue','active')->get();
        return view('business-setup.business-branch.add', compact(['branch', 'businessType', 'employees', 'days']));
    }



    public function store(Request $request)
    {
        $branch = new BusinessBranch();
        $request->validate( $this->rules($branch->id) ,[
        ], [
            'type_id'=>'نوع النشاط',
            'name'=>' اسم الفرع',
            'email'=>'البريد الالكتروني',
            'phone'=>' الهاتف ',
            'logo'=>' الشعار ',
            'document'=>' مستند الفرع ',

        ]);

        $branch->business_type_id = $request->type_id;
        $branch->name = $request->name;
        $branch->phone = $request->phone;
        $branch->email = $request->email;
        $branch->manager_id = $request->manager_id;
        $branch->logo = $this->imgHandeler($request, 'logo', $branch->name);
        $branch->documents = $this->docsHandeler($request, 'document', $branch->name);
        $branch->address = $request->adress;
        $branch->latitude = $request->latitude;
        $branch->longitude = $request->longitude;
         $branch->save();
        return redirect(url('business-setup/business-branch/'.$branch->id))->with('success', __('general.branch_added_success'));
    }

    public function show($id)
    {
        $businessType = BusinessType::all();
        $branch = BusinessBranch::where('id', $id)->with('businessType')->first();
        $branch_employees = EmployeeGeneralData::where('branch_id', $id)->get();
        $branch_attendence_rules = BranchAttendanceRules::where('branch_id', $id)->get();
        $delay_penalties = DelayPenalty::where('branch_id', $id)->get();
        $absence_penalties = AbsencePenalty::where('branch_id', $id)->get();
        $employees = EmployeeGeneralData::all();
        return view('business-setup.business-branch.show', compact(['branch', 'employees', 'businessType', 'branch_employees', 'branch_attendence_rules', 'delay_penalties', 'absence_penalties']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
       $request->validate($request,[
       ], [
           'type_id'=>'نوع النشاط',
           'name'=>' اسم الفرع',
           'email'=>'البريد الالكتروني',
           'phone'=>' الهاتف ',
           'logo'=>' الشعار ',
           'document'=>' مستند الفرع ',

       ]);
        $branch = BusinessBranch::find($id);
        $branch->business_type_id = $request->type_id;
        $branch->name = $request->name;
        $branch->phone = $request->phone;
        $branch->email = $request->email;
        $branch->manager_id = $request->manager_id;
        $branch->logo = $this->imgHandeler($request, 'logo', $branch->name);
        $branch->documents = $this->docsHandeler($request, 'document', $branch->name);
        $branch->address = $request->adress;
        $branch->latitude = $request->latitude;
        $branch->longitude = $request->longitude;
        // $branch->business_type_id = $request->branchType;
        // $branch->name = $request->branchName;
        // $branch->phone = $request->branchPhone;
        // $branch->email = $request->branchEmail;
        // $branch->manager_id = $request->branchContactPerson;
        // if ($request->hasFile('branchLogo')) {
        //     $branch->logo = $this->imgHandeler($request, 'branchLogo', $branch->name);
        // }
        // if ($request->hasFile('branchMainPhoto')) {
        //     $branch->main_photo = $this->imgHandeler($request, 'branchMainPhoto', $branch->name);
        // }
        // if ($request->hasFile('branchDocument')) {
        //     $branch->documents = $this->docsHandeler($request, 'branchDocument', $branch->name);
        // }
        // $branch->address = $request->branchAdress;
        // $branch->latitude = $request->branchLatitude;
        // $branch->longitude = $request->branchLongitude;
        $branch->update();
        return redirect()->back()->with("success", __('general.successEdite'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = BusinessBranch::find($id);
        if ($branch) {
            $branch->delete_relations();
            $branch->delete();
        }
        return redirect()->back()->with("success", __('general.successDeleted'));
    }
}
