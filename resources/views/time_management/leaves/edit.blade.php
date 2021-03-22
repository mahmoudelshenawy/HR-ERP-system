<div id="edit_leave{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('nav.employee_leaves')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form onsubmit="handleLeavesSubmit({{$id}})">
               
                    @csrf()
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label" style="display: block">{{__('business-setup.employee_name')}}<span class="text-danger">*</span></label>
                            <select class="js-example-matcher-start" name="employee_id" id="employee_id_{{$id}}" style="display: block">
                                    @foreach(App\EmployeeGeneralData::all() as $employee)
                                        <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label" style="display: block">{{__('time_management.leave_type')}}<span class="text-danger">*</span></label>
                            <select class="js-example-matcher-start" name="leave_type_id" id="leave_type_id_{{$id}}" style="display: block">
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
                                <input type="text" name="start_day"  class="form-control floating  datetimepicker" id="start_day_{{$id}}">
                                </div>
                                <label class="focus-label">{{trans('time_management.start_day')}}</label>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label class="focus-label">{{trans('time_management.end_day')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="end_day"  class="form-control floating datetimepicker" id="end_day_{{$id}}">
                                </div>
                                <label class="focus-label">{{trans('time_management.end_day')}}</label>
                            </div>
                        </div>
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label class="col-form-label offset-4">{{__('time_management.cause')}} <span class="text-danger">*</span></label>
                            <input class="form-control" name="cause" id="cause_{{$id}}">
                            </div>
                        </div>

                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
               
            </form>
        </div>
        </div>
    </div>
</div>
<script>
    $(".js-example-matcher-start").select2({
        width: '100%',
        minHeight:'100%',
        lineHeight:'44px',
    });
    $('.datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: 'en'
    });
</script>

