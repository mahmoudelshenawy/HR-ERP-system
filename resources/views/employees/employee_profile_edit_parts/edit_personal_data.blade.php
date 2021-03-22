<div id="profile_info" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.personal_data')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-img-wrap edit-img">
                            <img id="blah" class="inline-block" src="@if($employee->employee_img)
                            {{asset('uploads/files/employees/code/'.$employee->code.'/'.$employee->employee_img)}}@else
                            {{asset('img/user.jpg')}} @endif ">
                            <div class="fileupload btn">
                                <span class="btn-text">{{__('general.edit')}}</span>
                                <input class="upload" type="file" name="employee_img" id="imgInp" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label data-toggle="tooltip" title="{{__('employee.cant_edit_branch')}}">{{__('employee.branch')}}
                                    </label>
                                    <!-- HTML to write -->
                                    <input type="text" value="{{DB::table('business_branches')->where('id',$employee->branch_id)->value('name')}}" disabled class="form-control is-invalid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label data-toggle="tooltip" title="{{__('employee.cant_edit_code')}}">{{__('employee.code')}}
                                    </label>
                                    <input type="text" value="{{$employee->code}}" disabled class="form-control is-invalid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('employee.name')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="employee_name" value="{{$employee->employee_name}}" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('employee.name_en')}}</label>
                                    <input type="text" name="employee_name_en" value="{{$employee->employee_name_en}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('employee.short_name')}}</label>
                                    <input type="text" name="employee_short_name" value="{{$employee->employee_short_name}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('employee.gender')}}<span class="text-danger"></span></label>
                                    <select class=" js-example-matcher-start" name="gender" >
                                        <option selected disabled>{{trans('general.select')}}</option>
                                        <option  value="male" {{$employee->gender == "male" ? 'selected':''}}> {{__('employee.male')}}</option>
                                        <option  value="female" {{$employee->gender == "female" ? 'selected':''}}>{{__('employee.female')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group" >
                                    <label class="col-form-label">{{__('employee.birth_date')}}</label>

                                    <div class="form-group form-focus focused">
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating datetimepicker"  name="birth_date" value={{ $employee->birth_date ? $employee->birth_date : ''}} >
                                        </div>
                                        <label class="focus-label">{{__('employee.birth_date')}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="col-form-label">{{__('employee.phone')}}</label>
                                <input type="tel" name="phone_1" value="{{$employee->phone_1}}" class="form-control" placeholder="">
                            </div>
                            <div class="col-6">
                                <label class="col-form-label">{{__('employee.phone2')}}<span class="text-danger"></span></label>
                                <input type="tel" name="phone_2"  value="{{$employee->phone_2}}" class="form-control">
                            </div>

                            <div class="col-6">
                                <label class="col-form-label">{{__('employee.email')}}<span class="text-danger"></span></label>
                                <input type="email" name="email" value="{{$employee->email}}" class="form-control">
                            </div>
                            <div class="col-6">
                                <label class="col-form-label">{{__('employee.nationality')}}<span class="text-danger"></span></label>
                                <select class=" js-example-matcher-start"  style="width: 100%" name="country_id" >
                                    <option  value="{{$employee->country_id}}"  selected="selected"> {{DB::table('countries')->where('id',$employee->country_id)->value('name') }}</option>
                                    @foreach(DB::table('countries')->get() as $country)
                                        <option  value="{{$country->id}}"> {{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="col-form-label">{{__('employee.religion')}}<span class="text-danger"></span></label>
                                <input type="text" name="religion" value="{{$employee->religion}}" class="form-control">
                            </div>
                            <div class="col-6">
                                <label class="col-form-label">{{__('employee.address')}}</label>
                                <input type="tel" name="address" value="{{$employee->address}}" class="form-control">
                            </div>

                            <div class="col-6">
                                <label class="col-form-label">{{__('employee.birth_place')}}<span class="text-danger"></span></label>
                                <input type="text" name="birth_place" value="{{$employee->birth_place}}" class="form-control">
                            </div>
                            <div class="col-6">
                                <label class="col-form-label">{{__('employee.guarantor')}}<span class="text-danger"></span></label>
                                <select class=" js-example-matcher-start"  style="width: 100%" name="guarantor_id" >
                                    <option  selected  value="{{$employee->guarantor_id}}">{{DB::table('guarantors')->where('id',$employee->guarantor_id)->value('name')}}</option>
                                    @foreach(DB::table('guarantors')->get() as $guarantor)
                                        <option  value="{{$guarantor->id}}"> {{$guarantor->name}}</option>
                                    @endforeach
                                </select>
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
