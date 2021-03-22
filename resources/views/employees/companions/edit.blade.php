<!-- Add business branch Modal -->
<div id="edit_companion{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.edit_companion')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{url('employees/companions/'.$id)}}" >
                <input type="hidden" value="PUT" name="_method">
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="col-form-label">{{__('employee.select_employee')}}<span class="text-danger">*</span></label>
                            <div class="form-group">
                                    <select class="js-example-matcher-start" name="employee_id" >
                                        @foreach(App\EmployeeGeneralData::where('statue','active')->get() as $employee)
                                            @if($employee_id == $employee->id)
                                            <option selected  value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                                @continue
                                            @endif
                                            <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.name')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name"  value="{{$name}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-form-label">{{__('employee.relative_relation')}}<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="js-example-matcher-start" name="relative_relation" >
                                 <option selected disabled value="{{$relative_relation}}">{{$relative_relation}}</option>
                                    @foreach(config("enums.companions") as $relation)
                                        <option value="{{$relation}}">{{$relation }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.residence_number')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="number" name="residence_number" value="{{$residence_number}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.birth_date')}}<span class="text-danger"></span></label>
                                <input type="text" class="form-control floating datetimepicker"  name="birth_date" value="{{$birth_date}}">
                            </div>
                        </div>

                        <!---------------------------- insurance block   ----------->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('employee.medical_insurance_type')}}</label>
                                <input type="text" class="form-control"  name="medical_insurance_type" value="{{$medical_insurance_type}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('employee.medical_insurance_number')}}</label>
                                <input type="number" class="form-control" name="medical_insurance_number" value="{{$medical_insurance_number}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>{{__('employee.medical_insurance_provider')}}</label>
                            <div class="form-group">
                                <select name="medical_insurance_id" class="select2-dropdown js-example-matcher-start form-control" >
                                    @if($medical_insurance_id == DB::table('medical_insurances')->where('id',$medical_insurance_id)->value('id'))
                                    <option disabled  selected value="{{$medical_insurance_id}}">{{DB::table('medical_insurances')->where('id',$medical_insurance_id)->value('name')}}</option>
                                    @endif
                                    @foreach(DB::table('medical_insurances')->get() as $medical)
                                        <option value="{{$medical->id}}">{{$medical->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" form-focus focused col-6">
                            <label>{{__('employee.medical_insurance_start_data')}}</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control floating datetimepicker"  name="medical_insurance_start_data"  value="{{$medical_insurance_start_data}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-focus focused ">
                                <label >{{__('employee.medical_insurance_end_data')}}</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control floating datetimepicker"  name="medical_insurance_end_data" value="{{$medical_insurance_end_data}}">
                                </div>
                            </div>
                        </div>
                        <!---------------------------- insurance block   ----------->
                        <div class="col-6" style="padding-top: 50px">
                            <label> {{__('employee.statue')}} </label>
                            <div class="status-toggle">
                                <input type="checkbox" id="active_statue_add" class="check" checked="" name="statue">
                                <label for="active_statue_add" class="checktoggle">checkbox</label>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </div>

            </form>
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
    $(".js-example-matcher-start").select2({
        width: '100%',
        minHeight:'100%',
    });
    $('.datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: 'en'
    });
</script>
