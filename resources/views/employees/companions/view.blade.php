<!-- Add business branch Modal -->
<div id="view_companion{{$companion->id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.viewcompanion')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('employee.employee_companion')}} <span class="text-danger"></span></label>
                                    <input type="text" class="form-control"  disabled  value="{{DB::table('employee_general_data')->where('id',$companion->employee_id)->value('employee_name')}}"></input>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.name')}} <span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="name" disabled value="{{$companion->name}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.relative_relation')}}<span class="text-danger"></span></label>
                                <select class="js-example-matcher-start" name="relative_relation" >
                                    <option selected disabled value="{{$companion->relative_relation}}">{{$companion->relative_relation}}</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.national_id')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="number" disabled name="national_id" value="{{$companion->national_id}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.residence_number')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="number" disabled name="residence_number" value="{{$companion->residence_number}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.birth_date')}}<span class="text-danger"></span></label>
                                <input type="text" class="form-control floating datetimepicker" disabled  name="birth_date" {{$companion->birth_date}}>
                            </div>
                        </div>

                        <!---------------------------- insurance block   ----------->
                        <div class="col-sm-6">
                            <div class="card leave-box" id="leave_sick">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>{{__('employee.insurance_statue')}}</label>
                                        <input type="checkbox" name="medical_insurance_statue" disabled class="checktoggle"
                                               {{ ($companion->medical_insurance_statue == 1)? 'checked': ''}} style="float: right" id="switch_sick"  onchange="myFunction()">
                                    </div>
                                    <div class="leave-item"  id="insurance"
                                        {{ ($companion->medical_insurance_statue == 1)? 'style="display: block"' : 'style="display: none"'}}>
                                        <div class="leave-row">
                                            <div class="leave-left">
                                                <div class="input-box">
                                                    <div class="form-group">
                                                        <label>{{__('employee.medical_insurance_type')}}</label>
                                                        <input type="text" class="form-control" disabled value="{{$companion->medical_insurance_type}}" name="medical_insurance_type">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{__('employee.medical_insurance_provider')}}</label>
                                                        <select name="medical_insurance_id" class="select2-dropdown js-example-matcher-start form-control" >
                                                            <option disabled   selected>{{DB::table('medical_insurances')->where('id',$companion->medical_insurance_id)->value('name')}}</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{__('employee.medical_insurance_number')}}</label>
                                                        <input type="number" class="form-control" name="medical_insurance_number" disabled value="{{$companion->medical_insurance_number}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>{{__('employee.start_and_expiry')}}</label>
                                                        <div class="input-group">
                                                            <div class=" form-focus focused col-6">
                                                                <div class="cal-icon">
                                                                    <input type="text" class="form-control floating datetimepicker" disabled value="{{$companion->medical_insurance_start_data}}" name="medical_insurance_start_data" >
                                                                </div>
                                                                <label class="focus-label">{{__('employee.start')}}</label>
                                                            </div>
                                                            <div class="form-focus focused col-6">
                                                                <div class="cal-icon">
                                                                    <input type="text" class="form-control floating datetimepicker" disabled value="{{$companion->medical_insurance_end_data}}" name="medical_insurance_end_data" >
                                                                </div>
                                                                <label class="focus-label">{{__('employee.expiry_date')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="h3 card-title with-switch">
                                {{__('employee.statue')}}
                                <div class="onoffswitch">
                                    <input type="checkbox" name="statue" disabled class="onoffswitch-checkbox" id="active_statue"  >
                                    <label class="onoffswitch-label" for="active_statue">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
        </div>
    </div>
</div>
<!-- /Add business branch Modal -->

<script>

    function myFunction() {
        var y = document.getElementById('insurance')
        if ( y.style.display === "none") {
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
    }
</script>
