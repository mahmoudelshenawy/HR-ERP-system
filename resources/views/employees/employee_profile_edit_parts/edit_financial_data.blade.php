

<div id="financial_data_edit" class="modal custom-modal fade show" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.financial_data')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{trans('employee.housing_allowance')}}</label>
                            <input type="number" name="housing_allowance" class="form-control" value="{{$employee->housing_allowance}}">
                        </div>
                        <div class="form-group">
                            <label>{{trans('employee.clothing_allowance')}}</label>
                            <input type="text" name="clothing_allowance" class="form-control" value="{{$employee->clothing_allowance}}">
                        </div>
                        <div class="form-group">
                            <label>{{trans('employee.food_allowance')}}</label>
                            <input type="text" name="food_allowance" class="form-control" value="{{$employee->food_allowance}}">
                        </div>
                        <div class="form-group">
                            <label>{{trans('employee.mobile_allowance')}}</label>
                            <input type="text" name="mobile_allowance" class="form-control" value="{{$employee->mobile_allowance}}">
                        </div>
                        <div class="form-group">
                            <label>{{trans('employee.gas_allowance')}}</label>
                            <input type="text" name="gas_allowance" class="form-control" value="{{$employee->gas_allowance}}">
                        </div>
                        <div class="form-group">
                            <label>{{trans('employee.car_allowance')}}</label>
                            <input type="text" name="car_allowance" class="form-control" value="{{$employee->car_allowance}}">
                        </div>
                        <div class="form-group">
                            <label>{{trans('employee.insurance_deduct')}}</label>
                            <input type="text" name="insurance_deduct" class="form-control" value="{{$employee->insurance_deduct}}">
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
