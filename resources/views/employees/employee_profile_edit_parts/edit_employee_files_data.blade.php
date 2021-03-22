<!------------------------national_id_edit---------------------->
<div id="national_id_edit" class="modal custom-modal fade show" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{__('employee.national_id')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row" >
                <div class="card card-file" style="min-width: 100%">
                    <div class="dropdown-file" >
                        <div class="file-options left">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="focus-label">{{__('employee.national_id')}}</label>
                            <input type="number" name="national_id_number" value="{{$employee->national_id_number}}" class="form-control" >
                        </div>

                        <div class="form-group">
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="national_id_expiry_date"  value="{{ $employee->national_id_expiry_date}}" class="form-control floating datetimepicker" >
                                </div>
                                <label class="focus-label">{{__('employee.expiry_date')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="button-wrapper">
                              <span class="label">
                               {{__('employee.upload')}}
                              </span>
                            <input type="file" name="national_id_file" class="upload_file"  >
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
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



<!------------------------passport_edit---------------------->
<div id="passport_edit" class="modal custom-modal fade show" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{__('employee.passport')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row" >
                <div class="card card-file" style="min-width: 100%">
                    <div class="dropdown-file" >
                        <div class="file-options left">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="focus-label">{{__('employee.passport_number')}}</label>
                            <input type="text" name="passport_number" class="form-control" value="{{$employee->passport_number}}" >
                        </div>
                       <div class="form-group">
                           <div class="form-group form-focus focused">
                               <div class="cal-icon">
                                   <input type="text" name="passport_start_date" value="{{ $employee->passport_start_date}}"  class="form-control floating datetimepicker" >
                               </div>
                               <label class="focus-label">{{__('employee.start_date')}}</label>
                           </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="passport_expiry_date"  value="{{ $employee->passport_expiry_date}}" class="form-control floating datetimepicker" >
                                </div>
                                <label class="focus-label">{{__('employee.expiry_date')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="button-wrapper">
                              <span class="label">
                               {{__('employee.upload')}}
                              </span>
                            <input type="file" name="passport_file" class="upload_file"  >
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
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


<!------------------------residence_edit---------------------->
<div id="residence_edit" class="modal custom-modal fade show" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{__('employee.residence')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row" >
                <div class="card card-file" style="min-width: 100%">
                    <div class="dropdown-file" >
                        <div class="file-options left">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="focus-label">{{__('employee.residence_number')}}</label>
                            <input type="text" name="residency_number"  value="{{$employee->residency_number}}" class="form-control">
                        </div>
                       <div class="form-group">
                           <div class="form-group form-focus focused">
                               <div class="cal-icon">
                                   <input type="text" name="residency_start_date" value="{{$employee->residency_start_date ? $employee->residency_start_date : ''}}" class="form-control floating datetimepicker" >
                               </div>
                               <label class="focus-label">{{__('employee.start_date')}}</label>
                           </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="residency_expiry_date" value="{{$employee->residency_expiry_date}}" class="form-control floating datetimepicker" >
                                </div>
                                <label class="focus-label">{{__('employee.expiry_date')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="button-wrapper">
                              <span class="label">
                               {{__('employee.upload')}}
                              </span>
                            <input type="file" name="residency_file" class="upload_file"  >
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
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


<!------------------------healthy_certificate---------------------->
<div id="healthy_certificate_edit" class="modal custom-modal fade show" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{__('employee.healthy_certificate')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row" >
                <div class="card card-file" style="min-width: 100%">
                    <div class="dropdown-file" >
                        <div class="file-options left">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="focus-label">{{__('employee.healthy_certificate_number')}}</label>
                            <input type="number"  name="healthy_certificate_number" class="form-control" value="{{$employee->healthy_certificate}}" >
                        </div>
                        <div class="form-group">
                            <label class="focus-label">{{__('employee.healthy_certificate_notice')}}</label>
                            <input type="text"  name="healthy_certificate_notice" class="form-control" value="{{$employee->healthy_certificate_notice}}" >
                        </div>
                        <div class="form-group">
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="healthy_certificate_cancel_date" value="{{$employee->healthy_certificate_cancel_date}}" class="form-control floating datetimepicker" >
                                </div>
                                <label class="focus-label">{{__('employee.cancel_date')}}</label>
                            </div>
                        </div>
                       <div class="form-group">
                           <div class="form-group form-focus focused">
                               <div class="cal-icon">
                                   <input type="text" name="healthy_certificate_expiry_date"  class="form-control floating datetimepicker" value="{{$employee->healthy_certificate_expiry_date}}">
                               </div>
                               <label class="focus-label">{{__('employee.expiry_date')}}</label>
                           </div>
                        </div>
                        <div class="form-group">
                            <div class="button-wrapper">
                              <span class="label">
                               {{__('employee.upload')}}
                              </span>
                            <input type="file" name="healthy_certificate_file" class="upload_file"  >
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
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



<!------------------------driving_licence---------------------->
<div id="driving_licence_edit" class="modal custom-modal fade show" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{__('employee.driving_licence')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row" >
                <div class="card card-file" style="min-width: 100%">
                    <div class="dropdown-file" >
                        <div class="file-options left">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="focus-label">{{__('employee.driving_licence_number')}}</label>
                            <input type="number"  name="driving_licence_number" class="form-control"  value="{{$employee->driving_licence_number}}" >
                        </div>
                       <div class="form-group">
                           <div class="form-group form-focus focused">
                               <div class="cal-icon">
                                   <input type="text" name="driving_licence_expiry_date" value="{{ $employee->driving_licence_expiry_date}} "  class="form-control floating datetimepicker" >
                               </div>
                               <label class="focus-label">{{__('employee.expiry_date')}}</label>
                           </div>
                        </div>
                        <div class="form-group">
                            <div class="button-wrapper">
                              <span class="label">
                               {{__('employee.upload')}}
                              </span>
                            <input type="file" name="driving_licence_file" class="upload_file"  >
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
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


<!------------------------experince_education---------------------->
<div id="experince_education_edit" class="modal custom-modal fade show" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{__('employee.experince_education')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row" >
                <div class="card card-file" style="min-width: 100%">
                    <div class="dropdown-file" >
                        <div class="file-options left">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="focus-label">{{__('employee.educational_qualification')}}</label>
                            <input type="text"  name="educational_qualification" class="form-control" value="{{$employee->educational_qualification}}">
                        </div>
                        <div class="form-group">
                            <label class="focus-label">{{__('employee.edication_university')}}</label>
                            <input type="text" name="educational_university"   value="{{$employee->educational_university}}" class="form-control ">
                        </div>
                       <div class="form-group">
                           <div class="form-group form-focus focused">
                               <div class="cal-icon">
                                   <input type="text" name="educational_qualification_year"  value="{{$employee->educational_qualification_year}}" class="form-control floating datetimepicker" >
                               </div>
                               <label class="focus-label">{{__('employee.educational_qualification_year')}}</label>
                           </div>
                        </div>
                        <div class="form-group">
                            <div class="button-wrapper">
                              <span class="label">
                               {{__('employee.educational_qualification_file')}}
                              </span>
                                <input type="file" name="educational_qualification_file" class="upload_file"  >
                            </div>
                        </div>
                           <hr>
                           <hr>
                           <hr>
                        <div class="form-group">
                            <label class="focus-label">{{__('employee.experience')}}</label>
                            <input type="text"  name="experience" class="form-control text" value="{{$employee->experience}}">
                        </div>

                        <div class="form-group">
                            <div class="button-wrapper">
                              <span class="label">
                               {{__('employee.cv')}}
                              </span>
                            <input type="file" name="educational_qualification_file" class="upload_file"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="button-wrapper">
                              <span class="label">
                               {{__('employee.upload')}}
                              </span>
                            <input type="file" name="educational_qualification_file" class="upload_file"  >
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
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






@section('css')

    <style>
        .button-wrapper {
            position: fixed;
            width: 150px;
            text-align: center;

        }
        .button-wrapper span.label {
            position: relative;
            z-index: 0;
            display: inline-block;
            width: 100%;
            background: #00bfff;
            cursor: pointer;
            color: #fff;
            padding: 10px 0;
            text-transform:uppercase;
            font-size:12px;
        }

        .upload_file {
            display: inline-block;
            position: absolute;
            z-index: 1;
            width: 100%;
            height: 50px;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }
    </style>
@endsection
