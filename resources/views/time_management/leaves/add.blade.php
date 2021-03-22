<div id="add_leave" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.add_leave')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{url('time-management/employee-leaves')}}" >
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.employee_name')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="employee_id" >
                                    <option selected > {{__('general.select')}}</option>
                                    @foreach(App\EmployeeGeneralData::where('statue','active')->get() as $employee)
                                        <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.leave_type')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="leave_type_id">
                                    <option  > {{__('general.select')}}</option>
                                    @foreach(App\LeaveTypes::all() as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label class="focus-label">{{trans('time_management.start_day')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="start_day"  class="form-control floating datetimepicker" >
                                </div>
                                <label class="focus-label">{{trans('time_management.start_day')}}</label>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label class="focus-label">{{trans('time_management.end_day')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="end_day"  class="form-control floating datetimepicker" >
                                </div>
                                <label class="focus-label">{{trans('time_management.end_day')}}</label>
                            </div>
                        </div>
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label class="col-form-label offset-4">{{__('time_management.cause')}} <span class="text-danger">*</span></label>
                                <input class="form-control" name="cause">
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



