<?php

namespace App\Http\Controllers\BusinessSetup;

use App\BusinessAdministration;
use App\BusinessBranch;
use App\BusinessJob;
use App\BusinessDepartment;
use App\DataTables\JobsDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\all;

class JobController extends Controller
{


    public function index(JobsDatatable $datatable)
    {

        return $datatable->render('business-setup.business-job.index');
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $validator = Validator::make($request->all(), ['jobName' => 'Required|max:255', 'departmentName' => 'Required']);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->has('departmentName')) {
            foreach ($request->departmentName as $department_id) {
                $job = new BusinessJob();
                $job->name = $request->jobName;
                $job->business_department_id = $department_id;
                $job->save();
            }
            return redirect()->back()->with("success", __('general.success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), ['jobName' => 'Required|max:255', 'departmentName' => 'Required']);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->has('departmentName')) {
                $job = BusinessJob::find($id);
                $job->name = $request->jobName;
                $job->business_department_id = $request->departmentName;
                $job->save();
            return redirect()->back()->with("success", __('general.successEdited'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $job = BusinessJob::find($id);
       if ($job){
           $job->delete();
           return redirect()->back()->with("success",__('general.successDeleted'));
       }
    }
}
