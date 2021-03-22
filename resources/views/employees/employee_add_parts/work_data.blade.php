<div id="work_data" class="tab-pane fade">
    <!----------------------------------------------------------------------------------- block 1 --------------------------------------------------->
     <!-- Page Content -->
                <div class="row" style="padding-top: 30px">
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 offset-1" >
                        <a href="#" class="form-group   btn-block">
                            <label class="col-form-label text-dark">{{__('employee.contract_type')}}</label>
                            <select class="js-example-matcher-start" name="contract_types_id" >
                                <option  selected value="" >{{__('employee.select')}}</option>
                                @foreach(DB::table('contract_types')->get() as $contract_type)
                                    <option value="{{$contract_type->id}}" > {{$contract_type->name}}</option>
                                @endforeach
                            </select>
                        </a>

                        <div class="roles-menu none-border"  >
                            <ul style="border: none"  >
                                <!_________________attendable______________>
                                <li >
                                    <a href="javascript:void(0)"> {{__('employee.attendable')}}
                                        <span class="role-action col-3" style="display: inline-block">
                                          <div class="status-toggle">
                                            <input type="checkbox" id="attendable" checked="checked"  name="attendable" class="check" >
                                            <label for="attendable" class="checktoggle">checkbox</label>
                                          </div>
                                    </span>
                                    </a>
                                </li><br>

                                <!______________________end attendabale______________________>


                                <!_________________have annual vacation______________>
                                <li style="padding-bottom: 7px" >
                                    <a href="javascript:void(0)";> {{__('employee.annual_vacation')}}
                                        <span class="role-action col-3" style="display: inline-block">
                                        <div class="status-toggle">
                                             <input type="checkbox" id="annual_vacation" class="check"  name="annual_vacation"   onchange="myFunction()" >
                                            <label for="annual_vacation" class="checktoggle">checkbox</label>
                                        </div>
                                    </span>
                                    </a>
                                </li>
                                <li style="padding-bottom: 7px">
                                    <div class="form-group col-10 offset-1" id="annual_vacation_days" style="display: none">
                                        <label><small class="text-info">{{trans('employee.annual_vacation_days_per_year')}}</small></label>
                                        <input type="text"  name="annual_vacation_days_per_year"
                                                class="form-control"  >

                                    </div>
                                </li>
                                <!______________________end have annual vacation______________________>

                                <!_________________service rewarde______________>
                                <li class="">
                                    <a href="javascript:void(0)";> {{__('employee.end_service_reward')}}
                                        <span class="role-action col-3" style="display: inline-block">
                                        <div class="status-toggle">
                                            <input type="checkbox" id="end_service_reward" class="check" name="end_service_reward" onchange="myFunction2()" >
                                            <label for="end_service_reward" class="checktoggle">checkbox</label>
                                        </div>
                                    </span>
                                    </a>
                                </li>
                                <li style="padding: 7px">
                                    <div class="form-group col-10 offset-1" id="end_service_reward_days" style="display: none">
                                        <label> <small class="text-info">{{trans('employee.end_service_reward_days_per_year')}}</small></label>
                                     <input type="text"  name="end_service_reward_days_per_year" class="form-control">
                                    </div>
                                </li>
                                <!______________________end service reward______________________>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
                        <div class="m-b-30 " >
                            <div class="row">
                                <div class="form-group col-6">
                                        <label class="col-form-label">{{trans('employee.select_job')}}<span class="text-danger" >*</span></label>
                                        <select class="js-example-matcher-start  form-control" name="job_id">
                                            <option hidden  value>{{trans('employee.select_job')}}</option>
                                            @foreach($department as $department)
                                                <optgroup label="{{$department->name . ' : '.DB::table('business_administrations')->where('id',$department->business_administration_id )->value('name')}}">
                                                    @foreach(DB::table('business_jobs')->where('business_department_id',$department->id)->get() as $job)
                                                        <option value="{{$job->id}}">{{$job->name}}</option>
                                                </optgroup>
                                                @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">{{trans('employee.manager_name')}}</label>
                                    <select class=" js-example-matcher-start"  name="manager_id" >
                                        <option selected value="">{{__('employee.select')}}</option>
                                        @foreach(DB::table('employee_general_data')->where('statue' , 'active')->get() as $manager)
                                            <option value="{{$manager->id}}">{{$manager->code}}    -   {{$manager->employee_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                        <div class="form-group">
                                            <label class="col-form-label">{{trans('employee.basic_salary') . ' '}}<small class="text-muted">{{trans('employee.per_month')}}</small></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text badge-success"> $ </span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="{{trans('employee.insert_salary_ammount')}}" value="0.00" name="basic_salary">
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group col-6">
                                        <label class="col-form-label">{{trans('employee.variable_pay')}}<small class="text-muted">{{trans('employee.per_month')}}</small></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text badge-danger" >$</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="{{trans('employee.insert_salary_amount')}}" value="0.00" name="variable_pay">
                                        </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="form-group form-focus focused">
                                        <div class="cal-icon">
                                            <input type="text" name="hiring_date"  class="form-control floating datetimepicker" >
                                        </div>
                                        <label class="focus-label">{{trans('employee.hiring_date')}}</label>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <div class="form-group form-focus focused">
                                        <div class="cal-icon">
                                            <input type="text" name="contract_starting_date"  class="form-control floating datetimepicker" >
                                        </div>
                                        <label class="focus-label">{{trans('employee.contract_starting_date')}}</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 offset-3">
                                    <div class="form-group form-focus focused">
                                        <div class="cal-icon">
                                            <input type="text" name="contract_ending_date"  class="form-control floating datetimepicker" >
                                        </div>
                                        <label class="focus-label">{{trans('employee.contract_ending_date')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-----------------------------contract model ------------------------->
                <div id="add_role" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{__('employee.contract_type')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <script>

        function myFunction() {
            var x = document.getElementById("annual_vacation_days");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }function myFunction2() {
            var x = document.getElementById("end_service_reward_days");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }



    </script>
