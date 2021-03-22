<div id="add_deduction" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.employee_deduction_data')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{-- <form method="post" action="{{url('employee/employee_deduction')}}" > --}}
            <form method="post" action="employee_deduction">
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.deduction_name')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="deduction_id">
                                    @foreach(App\FixedDeduction::all() as $deduction)
                                        <option value="{{$deduction->id}}">{{$deduction->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.deduction_amount')}}<span class="text-danger">*</span></label>
                                <input type="number" name="deduction_amount" class="form-control">
                            </div>
                        </div>
                    <input type="hidden" name="employee_id" value="{{$employee->id}}">
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


