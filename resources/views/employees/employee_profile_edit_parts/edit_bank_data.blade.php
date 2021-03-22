

<div id="bank_data_edit" class="modal custom-modal fade show" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.banking_data')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{trans('employee.bank_name')}}</label>
                            <select name="employee_bank_id" class="select2-dropdown js-example-matcher-start form-control" >
                                @if($employee->bank_id)
                                <option selected value="{{DB::table('bank_data')->where('id',$employee->bank_id)->value('id')}}">{{DB::table('bank_data')->where('id',$employee->banck_id)->value('name')}}</option>
                                @else
                                    <option selected disabled>{{__('employee.select')}}</option>
                                @endif
                                @foreach(DB::table('bank_data')->get() as $bank)
                                        <option  value="{{$bank->id}}">{{$bank->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{trans('employee.bank_account_number')}}</label>
                            <input type="number" name="employee_account_number" class="form-control" value="{{$employee->employee_account_number}}">
                        </div>
                        <div class="form-group">
                            <label>{{trans('employee.bank_account_name')}}</label>
                            <input type="text" name="employee_bank_account_name" class="form-control" value="{{$employee->employee_bank_account_name}}">
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
