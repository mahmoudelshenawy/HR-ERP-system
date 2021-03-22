<!------------------medical_insurance_data_edit--------------------->
<div id="medical_insurance_data_edit" class="modal custom-modal fade show" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.medical_insurance')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
               <div class="modal-body">
                     <div class="row">
                            <div class="col-md-12">
                                <div class="h3 card-title with-switch">
                                    {{trans('employee.insurance_statue')}}
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="employee_medical_insurance_statue" class="onoffswitch-checkbox"
                                               {{($employee->employee_medical_insurance_statue == 1)?  "checked" :  '' }}
                                               id="medical_insurance_statue"  onchange="myFunction3()">
                                        <label class="onoffswitch-label" for="medical_insurance_statue">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div  class="col-12" id="insurance" @if($employee->employee_medical_insurance_statue == 1 ) style="display: block" @else style="display: none"@endif>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">{{trans('employee.medical_insurance_provider')}}</label>
                                        <select name="medical_insurance_id" class="select2-dropdown js-example-matcher-start input-" >
                                            <option></option>
                                            @foreach(DB::table('medical_insurances')->get() as $medical)
                                                @if($medical->id == $employee->medical_insurance_id)
                                                    <option selected  value="{{$medical->id}}">{{$medical->name}}</option>
                                                    @continue
                                                @endif
                                                <option value="{{$medical->id}}">{{$medical->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">{{trans('employee.medical_insurance_type')}}</label>
                                        <input type="text" class="form-control" name="medical_insurance_type"
                                               value="{{$employee->medical_insurance_type}}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">{{trans('employee.medical_insurance_number')}}</label>
                                        <input type="number" name="medical_insurance_number" class="form-control"
                                               value="{{$employee->medical_insurance_number}}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">{{trans('employee.medical_insurance_start_data')}}</label>
                                        <div class="form-group form-focus focused">
                                            <div class="cal-icon">
                                                <input type="text" name="medical_insurance_start_data"  class="form-control floating datetimepicker" value="{{$employee->medical_insurance_start_data}}" >
                                            </div>
                                            <label class="focus-label">{{trans('employee.medical_insurance_start_data')}}</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">{{trans('employee.medical_insurance_end_data')}}</label>
                                        <div class="form-group form-focus focused">
                                            <div class="cal-icon">
                                                <input type="text" name="medical_insurance_end_data"  class="form-control floating datetimepicker" value="{{$employee->medical_insurance_end_data}}" >
                                            </div>
                                            <label class="focus-label">{{trans('employee.medical_insurance_end_data')}}</label>
                                        </div>
                                    </div>
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



<!------------------social_insurance_data_edit--------------------->
<div id="social_insurance_data_edit" class="modal custom-modal fade show" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.social_insurance')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
               <div class="modal-body">
                     <div class="row">
                            <div class="col-md-12">
                                <div class="h3 card-title with-switch">
                                    {{trans('employee.employee_social_insurance_statue')}}
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="employee_social_insurance_statue" class="onoffswitch-checkbox"
                                               {{($employee->employee_social_insurance_statue == 1)?  "checked" :  '' }}
                                               id="employee_social_insurance_statue"  onchange="myFunction4()">
                                        <label class="onoffswitch-label" for="employee_social_insurance_statue">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div  class="col-12" id="social_insurance_details" @if($employee->employee_social_insurance_statue == 1 ) style="display: block" @else style="display: none"@endif>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">{{trans('employee.employee_social_insurance_number')}}</label>
                                        <input type="number" name="employee_social_insurance_number" class="form-control"
                                               value="{{$employee->employee_social_insurance_number	}}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">{{trans('employee.medical_insurance_start_data')}}</label>
                                        <div class="form-group form-focus focused">
                                            <div class="cal-icon">
                                                <input type="text" name="socialinsurance_join_date"  class="form-control floating datetimepicker" value="{{$employee->socialinsurance_join_date}}" >
                                            </div>
                                            <label class="focus-label">{{trans('employee.socialinsurance_join_date')}}</label>
                                        </div>
                                    </div>
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












<script>

    function myFunction3() {
        var y = document.getElementById('insurance')
        if ( y.style.display === "none") {
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
    }
    function myFunction4() {
        var y = document.getElementById('social_insurance_details')
        if ( y.style.display === "none") {
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
    }
</script>
