<!-- Add business branch Modal -->
<div id="edit_loan{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.add_loan')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{url('employees/loans/'.$id)}}" >
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <label data-toggle="tooltip" title="{{__('employee.cant_edit_code')}}" class="col-form-label">{{__('employee.select_employee')}}<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="js-example-matcher-start " name="employee_id" >
                                    @foreach(DB::table('employee_general_data')->where('statue','active')->get()  as $employee)
                                            <option {{$employee->id == $employee_id  ? 'selected':''}} value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="focus-label">{{trans('employee.loan_date')}}</label>
                                <div class="cal-icon">
                                    <input type="text" name="loan_date"  class=" form-control floating datetimepicker" value="{{$loan_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.loan_amount')}}<span class="text-danger">*</span></label>
                                <input type="number" name="loan_amount" class="form-control" value="{{$loan_amount}}">
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.installment_amount')}}<span class="text-danger">*</span></label>
                                <input type="number" name="installment_amount" class="form-control" value="{{$installment_amount}}">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group" >
                                <label class="focus-label">{{__('employee.installment_month')}}</label>
                                <div class="form-group form-focus focused">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker_monthly"  name="installment_month" value="{{$installment_month}}">
                                    </div>
                                    <label class="focus-label">{{__('employee.installment_month')}}</label>
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
    $('.datetimepicker_monthly').datetimepicker({
        format: 'MM/YYYY',
        locale: 'en'
    });
</script>
