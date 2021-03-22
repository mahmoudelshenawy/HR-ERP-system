<div class="tab-pane fade" id="bank_data">

    <div class="card profile-box flex-fill col-10">
        <div class="card-body col-12" >
            <h3 class="card-title">{{trans('employee.banking_data')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#bank_data_edit"><i class="fa fa-pencil"></i></a></h3>
            <ul class="personal-info">
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.bank_name')}}</div>
                    <div class="text" style="display: inline-block">
                        {{  ($employee->bank_id)?
                        DB::table('bank_data')->where('id',$employee->bank_id)->value('name'): trans('employee.no_data')
                      }}
                    </div>
                </li>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.bank_account_number')}}</div>
                    <div class="text" style="display: inline-block">
                        {{
                         ($employee->employee_account_number)? $employee->employee_account_number
                     : trans('employee.no_data')}}
                    </div>
                </li>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.bank_account_name')}}</div>
                    <div class="text" style="display: inline-block">
                        {{
                         ($employee->employee_bank_account_name)? $employee->employee_bank_account_name
                       : trans('employee.no_data')}}
                    </div>
                </li>
            </ul>
        </div>
    </div>



</div>
