

<div id="insurance_financial" class="modal custom-modal fade show" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label>{{trans('employee.insurance_basic')}}</label>
                            <input type="number" name="insurance_basic" class="form-control" value="{{$employee->insurance_basic}}">
                        </div>
                        <div class="form-group">
                            <label>{{trans('employee.insurance_variable')}}</label>
                            <input type="text" name="insurance_variable" class="form-control" value="{{$employee->insurance_variable}}">
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">{{__('general.submit')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
