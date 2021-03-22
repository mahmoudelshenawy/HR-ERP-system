<div id="add_employee_shift" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.add_shift')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{url('time-management/employees_shifts')}}" >
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.employee_name')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="employee_id[]" multiple>
                                    <option disabled>{{__('general.select')}}</option>
                                    @foreach(DB::table('employee_general_data')->where('statue','active')->get() as $employee)
                                        <option  value="{{$employee->id}}"> {{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.shift')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="shift_id">
                                    @foreach(DB::table('shifts')->get() as $shift)
                                        <option  value="{{$shift->id}}"> {{$shift->name}}</option>
                                    @endforeach
                                </select>
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




