<?php

namespace App\Http\Controllers\BusinessSetup;

use App\DataTables\GuarantorsDatatable;
use App\Guarantor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuarantorController extends Controller
{
    private function rules ($id){
        return $rules =  ['guarantorCode'=>'Required|Numeric|unique:guarantors,code,'.$id,
            'guarantorName' => 'Required|max:255|unique:guarantors,name,'.$id,
            'guarantorPhone'=> 'nullable|Numeric|Unique:guarantors,phone,'.$id,
            'guarantorImage'=> 'image|mimes:jpeg,png,jpg,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ];
    }
    private function imgHandeler ( Request $request, $input, $path){
        if ($request->hasFile($input)) {
            $name = time().'.'.$request->$input->getClientOriginalName();
            $request->$input->move(public_path('uploads/files/guarantors/'.$path),$name);
            return $name;
        }
    }



    public function index(GuarantorsDatatable $datatable)
    {
        return $datatable->render('business-setup.guarantor.index');
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
        $guarantor = new Guarantor();
        $validator = Validator::make($request->all(),$this->rules($guarantor->id));
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $guarantor->code = $request->guarantorCode ;
        $guarantor->name = $request->guarantorName ;
        $guarantor->phone = $request->guarantorPhone ;
        $guarantor->address = $request->guarantorAddress ;
        $guarantor->img = $this->imgHandeler($request,'guarantorImage',$guarantor->name);
        if ($guarantor->save()){
            return redirect()->back()->with('success',__('general.success'));
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
        $guarantor =  Guarantor::find($id);
        $validator = Validator::make($request->all(),$this->rules($guarantor->id));
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $guarantor->code = $request->guarantorCode ;
        $guarantor->name = $request->guarantorName ;
        $guarantor->phone = $request->guarantorPhone ;
        $guarantor->address = $request->guarantorAddress ;
        if ($request->hasFile('guarantorImage')){
            $guarantor->img = $this->imgHandeler($request,'guarantorImage',$guarantor->name);
        }
        if ($guarantor->save()){
            return redirect()->back()->with('success',__('general.success'));
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
        $guarantor = Guarantor::find($id);
        if ($guarantor){
            $guarantor->delete();
            return redirect()->back()->with('success',__('general.successDeleted'));
        }
    }
}
