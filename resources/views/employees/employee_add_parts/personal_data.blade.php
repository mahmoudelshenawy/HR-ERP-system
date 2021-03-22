<!-- Add employee general data Modal -->

<!-- Profile Info Tab -->
<div id="personal_data" class="pro-overview tab-pane fade show active">
    <div class="row">
        <div class="col-12" >
            <div class=" col-10 offset-md-1" >
                <div class="card-body" >
                    <div class="row">
                        <div class="form-group col-4">
                            <label class="col-form-label text-muted" >{{__('employee.code')}}<span class="text-danger">*</span></label>
                            <div class="form-group form-focus focused">
                            <input type="number" name="employee_code"   class="form-control ">
                            </div>
                        </div>
                         <div class="col-4">
                           <label class="col-form-label text-muted">{{__('employee.name')}}<span class="text-danger">*</span></label>
                             <div class="form-group form-focus focused">
                                 <input type="text" name="employee_name"  class="form-control">
                             </div>
                         </div>
                         <div class="col-4">
                             <label class="col-form-label text-muted">{{__('employee.name_en')}}</label>
                             <div class="form-group form-focus focused">
                                 <input type="text" name="employee_name_en" value="" class="form-control">
                             </div>
                          </div>
                        <div class="col-4">
                            <label class="col-form-label text-muted">{{__('employee.short_name')}}</label>
                            <div class="form-group form-focus focused">
                              <input type="text" name="employee_short_name" value="" class="form-control">
                            </div>
                        </div>
                        <hr class="text-muted">
                         <div class="col-4">
                                <label class="col-form-label text-muted">{{__('employee.gender')}}<span class="text-danger"></span></label>
                             <div class="form-group form-focus focused">
                             <select class=" js-example-matcher-start" name="gender" >
                                    <option  value="" selected disabled > {{__('employee.select')}}</option>
                                    <option  value="male"> {{__('employee.male')}}</option>
                                    <option  value="female">{{__('employee.female')}}</option>
                                </select>
                             </div>
                         </div>
                        <div class="title col-4" >
                            <label class="col-form-label text-muted">{{__('employee.phone')}}<span class="text-danger">*</span></label>
                            <div class="form-group form-focus focused">
                            <input type="text" name="phone_1" class="form-control" >
                            </div>
                        </div>
                        <div class="title col-4" >
                            <label class="col-form-label text-muted">{{__('employee.phone2')}}<span class="text-danger"></span></label>
                            <div class="form-group form-focus focused">
                            <input type="text" name="phone_2"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-4" >
                            <label class="col-form-label text-muted">{{__('employee.email')}}</label>
                            <div class="form-group form-focus focused">
                            <input type="email" name="email"  class="form-control" placeholder="email@example.com">
                            </div>
                        </div>

                        <div class="title col-4" >
                            <label class="col-form-label text-muted">{{__('employee.address')}}</label>
                            <div class="form-group form-focus focused">
                            <input type="text" name="address"  class="form-control">
                            </div>
                        </div>

                        <div class="form-group col-4" >
                            <label class="col-form-label text-muted">{{__('employee.guarantor')}}<span class="text-danger"></span></label>
                            <div class="form-group form-focus focused">
                            <select class="js-example-matcher-start" name="guarantor_id">
                                <option  selected disabled>{{__('employee.select')}}</option>
                                @foreach(DB::table('guarantors')->get() as $guarantor)
                                    <option  value="{{$guarantor->id}}"> {{$guarantor->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="title col-4" >
                            <label class="col-form-label text-muted">{{__('employee.nationality')}}<span class="text-danger"></span></label>
                            <div class="form-group form-focus focused">
                            <select class="js-example-matcher-start"  style="width: 100%" name="country_id" >
                                <option disabled selected> {{trans('employee.select')}}</option>
                                @foreach(DB::table('countries')->get() as $country)
                                    <option  value="{{$country->id}}"> {{$country->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="title col-4">
                           <label class="col-form-label text-muted">{{__('employee.religion')}}<span class="text-danger"></span></label>
                            <div class="form-group form-focus focused">
                            <input type="text" name="religion"  class="form-control">
                            </div>
                        </div>
                        <div class="title col-4" >
                            <label class="col-form-label text-muted">{{__('employee.birth_place')}}<span class="text-danger"></span></label>
                            <div class="form-group form-focus focused">
                            <input type="text" name="birth_place" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group  col-4" >
                            <label class="focus-label text-muted">{{__('employee.birth_date')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" class="form-control floating datetimepicker"  name="birth_date" >
                                </div>
                                <label class="focus-label">{{__('employee.birth_date')}}</label>
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.residency_job')}}</label>
                            <div class="form-group form-focus focused">
                            <input type="text"  name="residency_job" class="form-control">
                            </div>
                        </div>

                        <div class="title col-4">
                            <label class="col-form-label text-muted">{{__('employee.national_id')}}<span class="text-danger"></span></label>
                            <div class="form-group form-focus focused">
                            <input type="text" name="national_id_number" value="" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group  col-sm-4" >
                            <label class="focus-label text-muted">{{__('employee.national_id_expiry')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" class="form-control floating datetimepicker"  name="national_id_expiry_date" >
                                </div>
                                <label class="focus-label">{{__('employee.expiry_date')}}</label>
                            </div>
                        </div>
                        <div style="margin-bottom: 5px;display: block" class="col-4"></div>
                        <div class="title col-4">
                            <label class="col-form-label text-muted">{{__('employee.passport_number')}}<span class="text-danger"></span></label>
                            <div class="form-group form-focus focused">
                            <input type="text" name="passport_number"  class="form-control" >
                            </div>
                        </div>
                        <div class="form-group  col-sm-4" >
                            <label class="focus-label text-muted">{{__('employee.passport_start_date')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" class="form-control floating datetimepicker"  name="passport_start_date" >
                                </div>
                                <label class="focus-label">{{__('employee.start_date')}}</label>
                            </div>
                        </div>

                        <div class="form-group  col-sm-4" >
                            <label class="focus-label text-muted">{{__('employee.passport_expiry_date')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" class="form-control floating datetimepicker"  name="passport_expiry_date" >
                                </div>
                                <label class="focus-label">{{__('employee.expiry_date')}}</label>
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.residence_number')}}</label>
                            <div class="form-group form-focus focused">
                            <input type="text" name="residency_number"  class="form-control">
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.residence_start_date')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="residency_start_date"  class="form-control floating datetimepicker" >
                                </div>
                                <label class="focus-label ">{{__('employee.residence_start_date')}}</label>
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.residence_expiry_date')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="residency_expiry_date"  class="form-control floating datetimepicker" >
                                </div>
                                <label class="focus-label">{{__('employee.residence_expiry_date')}}</label>
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.driving_licence_number')}}</label>
                            <div class="form-group form-focus focused">
                            <input type="number"  name="driving_licence_number" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.expiry_date')}}</label>
                            <div class="form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="driving_licence_expiry_date"  class="form-control floating datetimepicker" >
                                </div>
                                <label class="focus-label">{{__('employee.expiry_date')}}</label>
                            </div>
                        </div>

                        <div style="margin-bottom: 5px;display: block" class="col-4"></div>

                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.healthy_certificate_number')}}</label>
                            <div class="form-focus ">
                                <input type="text"  name="healthy_certificate_number" class="form-control " >
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.healthy_certificate_notice')}}</label>
                            <div class="form-focus ">
                                <input type="text"  name="healthy_certificate_notice" class="form-control " >
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.healthy_certificate_expiry_date')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="healthy_certificate_expiry_date"  class="form-control floating datetimepicker" >
                                </div>
                                <label class="focus-label text-muted">{{__('employee.expiry_date')}}</label>
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.healthy_certificate_cancel_date')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="healthy_certificate_cancel_date"  class="form-control floating datetimepicker" >
                                </div>
                                <label class="focus-label text-muted">{{__('employee.cancel_date')}}</label>
                            </div>
                        </div>
                        <div style="margin-bottom: 5px;display: block" class="col-4"></div>
                        <div style="margin-bottom: 5px;display: block" class="col-4"></div>

                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.educational_qualification')}}</label>
                            <div class="form-focus ">
                                <input type="text"  name="educational_qualification" class="form-control " >
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.university')}}</label>
                            <div class="form-focus ">
                                <input type="text"  name="educational_university" class="form-control " >
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label class="focus-label text-muted">{{__('employee.educational_qualification_year')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" class="form-control floating datetimepicker"  name="educational_qualification_year" >
                                </div>
                                <label class="focus-label">{{__('employee.educational_qualification_year')}}</label>
                            </div>
                        </div>
                        <div class="col-10 offset-1" style="margin-bottom: 100px">
                            <label class="focus-label text-muted">{{__('employee.experience')}}</label>
                            <div class="form-focus ">
                                <textarea   name="experience" class="form-control" style="min-height: 100px"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
