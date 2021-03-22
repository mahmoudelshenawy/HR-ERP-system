<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_advance{{$id}}"><i class="fa fa-trash " ></i> </a>

<a class=" btn-sm btn-outline-info edit_advance_btn" href="#" id="edit_advance_btn" data-toggle="modal" onclick="getAdvanceData({{$id}})" data-target="#edit_advance_{{$id}}"><i class="fa fa-pencil " ></i> </a>


@include('salary.advance.delete')

<div id="edit_advance_{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('salary.advance')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form class="advance_form" onsubmit="handleAdvanceSubmit({{$id}})">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
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

                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label" style="display: block">{{__('salary.month')}}<span class="text-danger">*</span></label>
                            <select class="js-example-matcher-start" name="month" id="month_{{$id}}">
                                    @foreach($months as $index=>$month)
                                        <option value="{{$index + 1}}">{{ trans('general.' . $month) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label" style="display: block">{{__('salary.advance_amount')}}<span class="text-danger">*</span></label>
                                <input type="number" name="advance_amount" class="form-control"  id="advance_amount_{{$id}}">
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
