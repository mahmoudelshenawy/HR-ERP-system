<!-- Add custody Modal -->
<div id="add_custady" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.add_custady')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{url('employees/custodys')}}" >
            <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.select_employee')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="employee_id" >
                                    <option>{{__('general.select')}}</option>
                                    @foreach(DB::table('employee_general_data')->where('statue','active')->get() as $employee)
                                        <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.custady_type')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="custody_type_id" >
                                    <option >{{__('general.select')}}</option>
                                    @foreach(DB::table('custody_types')->get() as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.custady_number')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="custody_number" >
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.name')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" >
                            </div>
                        </div>
                        <div class="col-sm-6"  style="display: none">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.custady_data')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="custody_data">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="focus-label">{{__('employee.custady_received_date')}}</label>
                            <div class="form-group">
                                <div class=" form-focus focused">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker"  name="custody_received_date" >
                                    </div>
                                    <label class="focus-label">{{__('employee.custady_received_date')}}</label>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <label class="focus-label">{{__('employee.custody_checking_date')}}</label>
                            <div class="form-group">
                                <div class=" form-focus focused">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker"  name="custody_checking_date" >
                                    </div>
                                    <label class="focus-label">{{__('employee.custody_checking_date')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="focus-label">{{__('employee.custody_insurance_expiry_date')}}</label>
                            <div class="form-group">
                                <div class=" form-focus focused ">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker"  name="custody_insurance_expiry_date" >
                                    </div>
                                    <label class="focus-label">{{__('employee.custody_insurance_expiry_date')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="focus-label">{{__('employee.custody_expiry_form_date')}}</label>
                            <div class="form-group">
                                <div class=" form-focus focused ">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker"  name="custody_expiry_form_date" >
                                    </div>
                                    <label class="focus-label">{{__('employee.custody_expiry_form_date')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="focus-label">{{__('employee.custody_return_date')}}</label>
                            <div class="form-group">
                                <div class=" form-focus focused ">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker"  name="custody_return_date" >
                                    </div>
                                    <label class="focus-label">{{__('employee.custody_return_date')}}</label>
                                </div>
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
<!-- /Add custody Modal -->
