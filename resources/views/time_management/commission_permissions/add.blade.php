<div id="add_commission_permissions" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.commission_permissions')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{url('time-management/commission_permissions')}}" >
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.employee_name')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="employee_id">
                                    @foreach(App\EmployeeGeneralData::all() as $employee)
                                        <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.from')}}<span class="text-danger">*</span></label>
                                <input type="text" name="from" class="form-control datetimepicker">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.to')}}<span class="text-danger">*</span></label>
                                <input type="text" name="to" class="form-control datetimepicker">
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



<script>
    function setTwoNumberDecimal(event) {
        this.value = parseFloat(this.value).toFixed(2);
    }
</script>

