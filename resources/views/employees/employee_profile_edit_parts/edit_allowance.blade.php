<div id="edit_allowance_{{$allowance->id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.employee_allowance_data')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="handleAllowanceSubmit({{$allowance->id}})">
                <div class="modal-body">
                    @csrf()
                    <div class="row">  
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.allowance_name')}}<span class="text-danger">*</span></label>

                            <select class="js-example-matcher-start" name="allowance_id" id="allowance_id_{{$allowance->id}}">
                                    @foreach(App\FixedAllowance::all() as $allow)
                                        <option value="{{$allow->id}}">{{$allow->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.allowance_amount')}}<span class="text-danger">*</span></label>
                            <input type="number" name="allowance_amount" class="form-control" id="allowance_amount_{{$allowance->id}}">
                            </div>
                        </div>
                    <input type="hidden" name="employee_id" value="{{$employee->id}}" id="employee_id_{{$allowance->id}}">
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>