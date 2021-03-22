<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_absence_delay{{$id}}"><i class="fa fa-trash " ></i> </a>

<a class=" btn-sm btn-outline-info edit_absence_delay_btn" href="#" id="edit_absence_delay_btn" data-toggle="modal" onclick="getAbsenceDelayData({{$id}})" data-target="#edit_absence_delay_{{$id}}"><i class="fa fa-pencil " ></i> </a>


@include('salary.absence_delay.delete')

<div id="edit_absence_delay_{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('salary.absence_delay_penalties')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form class="advance_form" onsubmit="handleAbsenceDelaySubmit({{$id}})">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label" style="display: block">{{__('business-setup.employee_name')}}<span class="text-danger">*</span></label>
                            <select class="js-example-matcher-start" name="employee_id" id="employee_id_{{$id}}">
                                    @foreach(App\EmployeeGeneralData::all() as $employee)
                                        <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <?php $months = ['January' , 'February' , 'March' , 'April' , 'May' , 'June' , 'July' , 'August' , 'September' , 'October' , 'November', 'December']; ?>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label" style="display: block">{{__('salary.month')}}<span class="text-danger">*</span></label>
                            <select class="js-example-matcher-start" name="month" id="month_{{$id}}">
                                    @foreach($months as $index=>$month)
                                        <option value="{{$index + 1}}">{{ trans('general.' . $month) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label" style="display: block">{{__('salary.absence_subtract')}}<span class="text-danger">*</span></label>
                                <input type="number" name="absence_subtract" class="form-control"  id="absence_subtract_{{$id}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label" style="display: block">{{__('salary.delay_subtract')}}<span class="text-danger">*</span></label>
                                <input type="number" name="delay_subtract" class="form-control"  id="delay_subtract_{{$id}}">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </div>
            </form>
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
