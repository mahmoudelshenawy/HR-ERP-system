<div class="tab-pane fade" id="financial_data">

    <div class="card profile-box flex-fill col-10">
        <div class="card-body col-12" >
            <h3 class="card-title">{{trans('employee.financial_data')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#financial_data_edit"><i class="fa fa-pencil"></i></a></h3>
            <ul class="personal-info">
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.housing_allowance')}}</div>
                    <div class="text" style="display: inline-block">
                        {{  $employee->housing_allowance   }}
                    </div>
                </li>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.clothing_allowance')}}</div>
                    <div class="text" style="display: inline-block">
                        {{  $employee->clothing_allowance   }}
                    </div>
                </li>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.food_allowance')}}</div>
                    <div class="text" style="display: inline-block">
                        {{  $employee->food_allowance   }}
                    </div>
                </li>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.mobile_allowance')}}</div>
                    <div class="text" style="display: inline-block">
                        {{  $employee->mobile_allowance   }}
                    </div>
                </li>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.gas_allowance')}}</div>
                    <div class="text" style="display: inline-block">
                        {{  $employee->gas_allowance   }}
                    </div>
                </li>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.car_allowance')}}</div>
                    <div class="text" style="display: inline-block">
                        {{  $employee->car_allowance   }}
                    </div>
                </li>
                <li>
                    <div class="title" style="display: inline-block">{{trans('employee.insurance_deduct')}}</div>
                    <div class="text" style="display: inline-block">
                        {{  $employee->insurance_deduct   }}
                    </div>
                </li>

            </ul>
        </div>
    </div>



</div>
