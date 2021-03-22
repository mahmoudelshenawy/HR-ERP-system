<!-- Add resignations Modal -->
<div id="add_resignation" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.new_resignation')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{url('employees/resignations')}}" >
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.resignatd_employee')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start " name="employee_id" required>
                                    @foreach(DB::table('employee_general_data')->where('statue','active')->get() as $employee)
                                        <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="focus-label">{{trans('employee.resignation_date')}}</label>
                                <div class="cal-icon">
                                    <input type="text" name="date"  class="form-control floating datetimepicker" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.resignation_reason')}}<span class="text-danger">*</span></label>
                                <input type="text" name="reason" class="form-control">
                            </div>
                        </div>
                        <!---------------------------- insurance block   ----------->
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
