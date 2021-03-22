<div id="edit_employee_shift{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.edit_employee_shift')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{url('time-management/employees_shifts/'.$id)}}" >
                <div class="modal-body">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf()
                    <div class="row">
                        <div class="col-6">
                            <label class="col-form-label">{{__('employee.employee_name')}}<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="js-example-matcher-start" name="employee_id" >
                                    <option disabled>{{__('general.select')}}</option>
                                    @foreach(DB::table('employee_general_data')->where('statue','active')->get() as $employee)
                                        <option  value="{{$employee->id}}" {{$employee_id == $employee->id?'selected':''}}> {{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">{{__('time_management.shift')}}<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="js-example-matcher-start" name="shift_id">
                                    @foreach(DB::table('shifts')->get() as $shift)
                                        <option  value="{{$shift->id}}" {{$shift_id == $shift->id?'selected':''}}> {{$shift->name}}</option>
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




