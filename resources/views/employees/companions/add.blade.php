<!-- Add business branch Modal -->
<div id="add_companion" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.add_companion')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{url('employees/companions')}}" >
            <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.select_employee')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="employee_id" >
                                    <option>{{__('general.select')}}</option>
                                    @foreach(App\EmployeeGeneralData::where('statue','active')->get() as $employee)
                                        <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.name')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" >
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.relative_relation')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="relative_relation" >
                                    <option>{{__('general.select')}}</option>
                                    @foreach(config("enums.companions") as $relation)
                                            <option value="{{$relation}}">{{$relation }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.national_id')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="number" name="national_id">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.residence_number')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="number" name="residence_number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.birth_date')}}<span class="text-danger"></span></label>
                                <input type="text" class="form-control floating datetimepicker"  name="birth_date" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('employee.medical_insurance_type')}}</label>
                                <input type="text" class="form-control"  name="medical_insurance_type">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('employee.medical_insurance_number')}}</label>
                                <input type="number" class="form-control" name="medical_insurance_number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('employee.medical_insurance_provider')}}</label>
                                <select name="medical_insurance_id" class="select2-dropdown js-example-matcher-start form-control" >
                                    <option disabled  selected></option>
                                    @foreach(DB::table('medical_insurances')->get() as $medical)
                                        <option value="{{$medical->id}}">{{$medical->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                         <div class=" form-focus focused col-6">
                             <label>{{__('employee.medical_insurance_start_data')}}</label>
                             <div class="cal-icon">
                                 <input type="text" class="form-control floating datetimepicker"  name="medical_insurance_start_data" >
                             </div>
                         </div>
                        <div class="col-6">
                            <div class="form-focus focused ">
                                <label >{{__('employee.medical_insurance_end_data')}}</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control floating datetimepicker"  name="medical_insurance_end_data" >
                                </div>
                            </div>
                        </div>
                        <!---------------------------- insurance block   ----------->
                        <div class="col-6" style="padding-top: 10px">
                            <label> {{__('employee.statue')}} </label>
                            <div class="status-toggle">
                                <input type="checkbox" id="active_statue_add" class="check" checked="" name="statue">
                                <label for="active_statue_add" class="checktoggle">checkbox</label>
                            </div>
                        </div>
                    </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
<!-- /Add business branch Modal -->
