<?php

namespace App\Http\Controllers\BusinessSetup;

use App\BusinessAdministration;
use App\BusinessBranch;
use App\DataTables\AdministrationsDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdministrationsDatatable $datatable)
    {
        //
        $administrations = BusinessAdministration::with('businessBranch')->get();
        return $datatable->render('business-setup.business-administration.index',compact(['administrations']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $validator = Validator::make($request->all(), ['administrationName' => 'Required|max:255','branchName'=>'Required']);
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->has('branchName')){
                foreach ($request->branchName as $branch_id){
                    $administration = new BusinessAdministration();
                    $administration->name = $request->administrationName ;
                    $administration->business_branche_id = $branch_id ;
                    $administration->save();
                }
            return redirect()->back()->with("success",__('general.success'));
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
        $validator = Validator::make($request->all(), ['administrationName' => 'Required|max:255','branchName'=>'Required']);
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $administration =  BusinessAdministration::find($id);
        $administration->name = $request->administrationName ;
        $administration->business_branche_id = $request->branchName ;
        $administration->save();
        return redirect()->back()->with("success",__('general.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $administration =  BusinessAdministration::find($id);
        if ($administration){
            $administration->delete();
        }
        return redirect()->back()->with("success",__('general.successDeleted'));
    }
}
