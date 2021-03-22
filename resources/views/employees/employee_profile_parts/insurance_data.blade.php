<div class="tab-pane fade" id="emp_insurance">
<div class="row">

    <div class=" profile-box flex-fill col-6">
        <div class=" card card-body col-12" >
            <h3 class="card-title">{{trans('employee.social_insurance')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#social_insurance_data_edit"><i class="fa fa-pencil"></i></a></h3>
            <ul class="personal-info">
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.employee_social_insurance_statue')}}</div>
                    <div class="text" >
                        @if($employee->employee_social_insurance_statue)
                            <div class="text-success "  style="display: inline-block">{{trans('general.yes')}}</div>
                        @else
                            <div class="text-danger"  style="display: inline-block">{{trans('general.no')}}</div>
                        @endif
                    </div>
                </li><br><br><br>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.employee_social_insurance_number')}}</div>
                    <div class="text" style="display: inline-block">
                        {{
                         ($employee->employee_social_insurance_number)? $employee->employee_social_insurance_number
                       : trans('employee.no_data')}}
                    </div>
                </li>
                <li>
                    <div class="text" style="display: inline-block">{{trans('employee.socialinsurance_join_date')}}</div>
                    <div class="text-info" style="display: inline-block;color: red">
                        {{
                         ($employee->socialinsurance_join_date)? $employee->socialinsurance_join_date
                  : trans('employee.no_data')}}
                    </div>
                </li>
                <hr>
                <hr>
                <h3 class="card-title"><a href="#" class="edit-icon" data-toggle="modal" data-target="#insurance_financial"><i class="fa fa-pencil"></i></a></h3>

                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.insurance_basic')}}</div>
                    <div class="text" >
                        <div class="text-success "  style="display: inline-block">{{$employee->insurance_basic}}</div>

                    </div>
                </li><br>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.insurance_variable')}}</div>
                    <div class="text-success "  style="display: inline-block">{{$employee->insurance_variable}}</div>
                </li>

            </ul>
        </div>
    </div>

    <div class=" profile-box flex-fill col-6">
        <div class=" card card-body col-12" >
            <h3 class="card-title">{{trans('employee.medical_insurance')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#medical_insurance_data_edit"><i class="fa fa-pencil"></i></a></h3>
            <ul class="personal-info">
                <li class="list-">
                    <div class="title">{{trans('employee.insurance_statue')}}</div>
                    @if($employee->employee_medical_insurance_statue)
                    <div class="text-success "  style="display: inline-block">{{trans('general.yes')}}</div>
                    @else
                        <div class="text-danger"  style="display: inline-block">{{trans('general.no')}}</div>
                    @endif
                </li><br><br>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.medical_insurance_provider')}}</div>
                    <div class="text" style="display: inline-block">{{
                       ( $employee->medical_insurance_id)?
                          DB::table('medical_insurances')->where('id',$employee->medical_insurance_id)->value('name')  :
                          trans('employee.no_data')}}
                    </div>
                </li>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.medical_insurance_type')}}</div>
                    <div class="text" style="display: inline-block">
                        {{
                     ($employee->medical_insurance_type)? $employee->medical_insurance_type
                    : trans('employee.no_data')
                    }}
                    </div>
                </li>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.medical_insurance_number')}}</div>
                    <div class="text-secondary" style="display: inline-block">
                        {{
                     ($employee->medical_insurance_number)? $employee->medical_insurance_number
                    : trans('employee.no_data')
                    }}
                    </div>
                </li>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.medical_insurance_start_data')}}</div>
                    <div class="text-info" style="display: inline-block">
                        {{
                     ($employee->medical_insurance_start_data)? $employee->medical_insurance_start_data
                    : trans('employee.no_data')
                    }}
                    </div>
                </li>
                <li>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.medical_insurance_end_data')}}</div>
                    <div class="text-danger" style="display: inline-block">
                        {{
                         ($employee->medical_insurance_end_data)? $employee->medical_insurance_end_data
                  : trans('employee.no_data')}}
                    </div>
                </li>

            </ul>
        </div>
    </div>


</div>
</div>
