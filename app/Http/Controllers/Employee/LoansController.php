<?php

namespace App\Http\Controllers\Employee;

use App\DataTables\LoansDatatable;
use App\EmployeeGeneralData;
use App\Http\Controllers\Controller;
use App\Loans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoansController extends Controller
{  private function rules ($id){
    return $rules =  [
        'employee_id'=>'Required',
        'loan_amount'=> 'Numeric|Required',
        'installment_amount'=> 'Numeric|Required',

    ];
}

    /**
     * Display a listing of the resource.
     *
     * @param LoansDatatable $datatable
     * @return \Illuminate\Http\Response
     */
    public function index(LoansDatatable $datatable)
    {
        return $datatable->render('employees.loans.index');
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

        $loans = new Loans();
        $validator = Validator::make($request->all(),$this->rules($loans->id));
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $loans->employee_id = $request->employee_id ;
        $loans->loan_date = $request->loan_date ;
        $loans->loan_amount = $request->loan_amount ;
        $loans->installment_month = $request->installment_month ;
        $loans->installment_amount = $request->installment_amount ;
        $loans->save();
        return redirect()->back()->with('success',__('general.success'));
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
        $loan = Loans::find($id);
        $validator = Validator::make($request->all(),$this->rules($loan->id));
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $loan->employee_id = $request->employee_id;
        $loan->loan_date = $request->loan_date ;
        $loan->loan_amount = $request->loan_amount ;
        $loan->installment_month = $request->installment_month ;
        $loan->installment_amount = $request->installment_amount ;
        $loan->save();
        return redirect()->back()->with('success',__('general.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $loan = Loans::find($id);
        $loan->delete();
        return redirect()->back()->with('success',__('general.success'));
    }
}
