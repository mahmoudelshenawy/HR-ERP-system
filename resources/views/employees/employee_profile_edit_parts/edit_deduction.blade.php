<div id="edit_deduction_{{$deduction->id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.employee_deduction_data')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="handleDeductionSubmit({{$deduction->id}})">
                <div class="modal-body">
                    @csrf()
                    <div class="row">  
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.deduction_name')}}<span class="text-danger">*</span></label>

                            <select class="js-example-matcher-start" name="deduction_id" id="deduction_id_{{$deduction->id}}">
                                    @foreach(App\FixedDeduction::all() as $deduct)
                                        <option value="{{$deduct->id}}">{{$deduct->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.deduction_amount')}}<span class="text-danger">*</span></label>
                            <input type="number" name="deduction_amount" class="form-control" id="deduction_amount_{{$deduction->id}}">
                            </div>
                        </div>
                    <input type="hidden" name="employee_id" value="{{$employee->id}}" id="employee_id_{{$deduction->id}}">
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>