<div id="emp_profile" class=" tab-pane fade show active">
    <div class="row " style="background-color: whitesmoke">
        <!------------------------------start national_id------------------------>
        <div class="col-xl-3 col-md-6 col-sm-6">
            <div class="card card-file">
                <h3 class="topic-title"  data-toggle="modal" data-target="#national_id" style="cursor: pointer;">{{trans('employee.national_card')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#national_id_edit"><i class="fa fa-pencil text-muted"></i></a></h3>
                <div class="card-body title">
                    <a class="title col-10"  data-toggle="modal" data-target="#national_id" style="cursor: pointer;">{{trans('employee.national_id')}}
                        <span class="text-info">{{($employee->national_id_number)? $employee->national_id_number: ''}} </span>
                    </a> <br>
                    <a class="title col-8">{{trans('employee.national_id_expiry_date')}}
                        <span style="display: inline-block" class="text-danger">{{ $employee->national_id_expiry_date ?  $employee->national_id_expiry_date: '' }}</span>
                    </a>
                </div>
                <div class="card-footer">
                    <div style="display: inline-block" class="title">
                        <span style="display: inline-block" class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div id="national_id" class="modal custom-modal fade show" role="dialog" style="display: none; padding-right: 17px;" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{trans('employee.national_id')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($employee->national_id_file)
                                <iframe src="{{asset('uploads/files/employees/code/' . $employee->code .'/'.$employee->national_id_file)}}" style="min-width: 100%;min-height: 300px">
                                </iframe>
                            @else
                                <div class="card-file-thumb" style="cursor: pointer;">
                                    <i class="fa fa-file-pdf-o"></i>
                                </div>
                            @endif
                            <div class="submit-section">
                                @if($employee->national_id_file)
                                    <a class="btn btn-custom" target="_blank" href="{{url('uploads/files/employees/code/' . $employee->code .'/'.$employee->national_id_file)}}">
                                        <i class="fa fa-download "></i>
                                    </a>
                                @else
                                    <a class="btn btn-custom"  data-dismiss="modal" aria-label="Close">{{trans('employee.file_not_found')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------end  national_id------------------------>


        <!------------------------------start passport------------------------>
        <div class="col-xl-3 col-md-6 col-sm-6">
            <div class="card card-file">
                <h3 class="topic-title"  data-toggle="modal" data-target="#passport" style="cursor: pointer;">{{trans('employee.passport')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#passport_edit"><i class="fa fa-pencil text-muted"></i></a></h3>
                <div class="card-body title">
                    <a class="title">{{trans('employee.passport_number')}}
                        <span class="text-info">{{($employee->passport_number)? $employee->passport_number: ''}} </span>
                    </a><br>
                    <a  class="title">{{trans('employee.start_date')}}
                        <span class="text-info">{{( ($employee->passport_start_date))?  $employee->passport_start_date: "  "}} </span>
                    </a>
                </div>
                <div class="card-footer">
                    <div style="display: inline-block" class="title">{{trans('employee.expiry_date')}}
                        <span style="display: inline-block" class="text-danger">{{ $employee->passport_expiry_date ?  $employee->passport_expiry_date: '' }}</span>
                    </div>
                </div>
            </div>
            <div id="passport" class="modal custom-modal fade show" role="dialog" style="display: none; padding-right: 17px;" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{trans('employee.passport')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($employee->passport_file)
                            <iframe src="{{url('uploads/files/employees/code/' . $employee->code .'/'.$employee->passport_file)}}" style="min-width: 100%;min-height: 300px">
                            </iframe>
                            @else
                                <div class="card-file-thumb" style="cursor: pointer;">
                                    <i class="fa fa-file-pdf-o"></i>
                                </div>
                            @endif
                            <div class="submit-section">
                                @if($employee->passport_file)
                                <a class="btn btn-custom" target="_blank" href="{{url('uploads/files/employees/code/' . $employee->code .'/'.$employee->passport_file)}}">
                                    <i class="fa fa-download "></i>
                                </a>
                                @else
                                <a class="btn btn-custom"  data-dismiss="modal" aria-label="Close">{{trans('employee.file_not_found')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------end  passport ------------------------>

        <!------------------------------start residence------------------------>
        <div class="col-xl-3 col-md-6 col-sm-6">
            <div class="card card-file">
                <h3 class="topic-title" data-toggle="modal" data-target="#residence" style="cursor: pointer;">{{__('employee.residence')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#residence_edit"><i class="fa fa-pencil text-muted"></i></a></h3>
                <div class="card-body title">
                    <a class="title">{{trans('employee.residence_number')}}
                        <span class="text-info">{{($employee->residency_number)? $employee->residency_number: ''}} </span>
                    </a><br>
                    <a  class="title">{{trans('employee.start_date')}}
                        <span class="text-info">{{( ($employee->residency_start_date))?  $employee->residency_start_date: "  "}} </span>
                    </a>
                </div>
                <div class="card-footer">
                    <div style="display: inline-block" class="title">{{trans('employee.expiry_date')}}
                        <span style="display: inline-block" class="text-danger">{{ $employee->residency_expiry_date ?  $employee->residency_expiry_date: '' }}</span>
                    </div>
                </div>
            </div>
            <div id="residence" class="modal custom-modal fade show" role="dialog" style="display: none; padding-right: 17px;" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{trans('employee.residence')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($employee->residency_file)
                            <iframe src="{{url('uploads/files/employees/code/' . $employee->code .'/'.$employee->residency_file)}}" style="min-width: 100%;min-height: 300px">
                            </iframe>
                            @else
                                <div class="card-file-thumb" style="cursor: pointer;">
                                    <i class="fa fa-file-pdf-o"></i>
                                </div>
                            @endif
                            <div class="submit-section">
                                @if($employee->residency_file)
                                <a class="btn btn-custom" target="_blank" href="{{url('uploads/files/employees/code/' . $employee->code .'/'.$employee->residency_file)}}">
                                    <i class="fa fa-download "></i>
                                </a>
                                @else
                                <a class="btn btn-custom"  data-dismiss="modal" aria-label="Close">{{trans('employee.file_not_found')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------end  residence ------------------------>



        <!------------------------------start driving_licence------------------------>
        <div class="col-xl-3 col-md-6 col-sm-6">
            <div class="card card-file">
                <h3 class="topic-title" data-toggle="modal" data-target="#driving_licence" style="cursor: pointer;">{{__('employee.driving_licence')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#driving_licence_edit"><i class="fa fa-pencil text-muted"></i></a></h3>
                <div class="card-body title">
                    <a class="title">{{trans('employee.driving_licence_number')}}
                        <span class="text-info">{{($employee->driving_licence_number)? $employee->driving_licence_number: ''}} </span>
                    </a><br>
                </div>
                <div class="card-footer">
                    <div style="display: inline-block" class="title">{{trans('employee.expiry_date')}}
                        <span style="display: inline-block" class="text-danger">{{ $employee->driving_licence_expiry_date ?  $employee->driving_licence_expiry_date: '' }}</span>
                    </div>
                </div>
            </div>
            <div id="driving_licence" class="modal custom-modal fade show" role="dialog" style="display: none; padding-right: 17px;" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{trans('employee.driving_licence')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($employee->driving_licence_file)
                                <iframe src="{{url('uploads/files/employees/code/' . $employee->code .'/'.$employee->driving_licence_file)}}" style="min-width: 100%;min-height: 300px">
                                </iframe>
                            @else
                                <div class="card-file-thumb" style="cursor: pointer;">
                                    <i class="fa fa-file-pdf-o"></i>
                                </div>
                            @endif
                            <div class="submit-section">
                                @if($employee->driving_licence_file)
                                    <a class="btn btn-custom" target="_blank" href="{{url('uploads/files/employees/code/' . $employee->code .'/'.$employee->driving_licence_file)}}">
                                        <i class="fa fa-download "></i>
                                    </a>
                                @else
                                    <a class="btn btn-custom"  data-dismiss="modal" aria-label="Close">{{trans('employee.file_not_found')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------end  driving_licence ------------------------>
        <!------------------------------start healthy_certificate------------------------>
        <div class="col-xl-4 col-md-6 col-sm-6">
            <div class="card card-file">
                <h3 class="topic-title" data-toggle="modal" data-target="#healthy_certificate" style="cursor: pointer;">{{__('employee.healthy_certificate')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#healthy_certificate_edit"><i class="fa fa-pencil text-muted"></i></a></h3>
                <div class="card-body ">
                    <a class="title">{{trans('employee.healthy_certificate_number')}}
                        <span class="text-info">{{($employee->healthy_certificate)? $employee->healthy_certificate: ''}} </span>
                    </a><br>
                    <a class="title">{{trans('employee.healthy_certificate_notice')}}
                        <span class="text-info">{{($employee->healthy_certificate_notice)? $employee->healthy_certificate_notice: ''}} </span>
                    </a><br>
                    <a  class="title">{{trans('employee.cancel_date')}}
                        <span class="text-danger">{{( ($employee->healthy_certificate_cancel_date))?  $employee->healthy_certificate_cancel_date: "  "}} </span>
                    </a>
                </div>
                <div class="card-footer">
                    <div style="display: inline-block" class="title">{{trans('employee.expiry_date')}}
                        <span style="display: inline-block" class="text-danger">{{ $employee->healthy_certificate_expiry_date ?  $employee->healthy_certificate_expiry_date: '' }}</span>
                    </div>
                </div>
            </div>
            <div id="healthy_certificate" class="modal custom-modal fade show" role="dialog" style="display: none; padding-right: 17px;" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{trans('employee.healthy_certificate')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($employee->healthy_certificate_file)
                            <iframe src="{{url('uploads/files/employees/code/' . $employee->code .'/'.$employee->healthy_certificate_file)}}" style="min-width: 100%;min-height: 300px">
                            </iframe>
                            @else
                                <div class="card-file-thumb" style="cursor: pointer;">
                                    <i class="fa fa-file-pdf-o"></i>
                                </div>
                            @endif
                            <div class="submit-section">
                                @if($employee->healthy_certificate_file)
                                <a class="btn btn-custom" target="_blank" href="{{url('uploads/files/employees/code/' . $employee->code .'/'.$employee->healthy_certificate_file)}}">
                                    <i class="fa fa-download "></i>
                                </a>
                                @else
                                <a class="btn btn-custom"  data-dismiss="modal" aria-label="Close">{{trans('employee.file_not_found')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
        <!--------------------------------end  healthy_certificate ------------------------>


        <!------------------------------start experince_education------------------------>
            <div class="col-md-8 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">{{__('employee.experince_education')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#experince_education_edit"><i class="fa fa-pencil"></i></a></h3>
                        <div class="experience-box">
                            <ul class="experience-list">
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <h3 href="#" class="name">{{$employee->educational_university ? $employee->educational_university: trans('employee.collage_data_not_found')}}</h3>
                                            <div>{{$employee->educational_qualification? $employee->educational_qualification: trans('employee.educational_qualification')}}</div>
                                            <span class="time">{{$employee->educational_qualification_year?$employee->educational_qualification_year:trans('employee.educational_qualification_year')}}</span><br>
                                        </div>
                                        <div class="btn btn-sm btn-outline-secondary text-center" >{{__('employee.educational_qualification_file')}}  <i class="fa fa-file-pdf-o"> </i></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#" class="name">{{$employee->experience ? $employee->experience : trans('employee.experince')}}</a><br><br>
                                         <a class="btn btn-outline-dark" >{{__('employee.cv')}}  <i class="fa fa-file-pdf-o"> </i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="driving_licence" class="modal custom-modal fade show" role="dialog" style="display: none; padding-right: 17px;" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{trans('employee.driving_licence')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($employee->driving_licence_file)
                                <iframe src="{{url('uploads/files/employees/code/' . $employee->code .'/'.$employee->driving_licence_file)}}" style="min-width: 100%;min-height: 300px">
                                </iframe>
                            @else
                                <div class="card-file-thumb" style="cursor: pointer;">
                                    <i class="fa fa-file-pdf-o"></i>
                                </div>
                            @endif
                            <div class="submit-section">
                                @if($employee->driving_licence_file)
                                    <a class="btn btn-custom" target="_blank" href="{{url('uploads/files/employees/code/' . $employee->code .'/'.$employee->driving_licence_file)}}">
                                        <i class="fa fa-download "></i>
                                    </a>
                                @else
                                    <a class="btn btn-custom"  data-dismiss="modal" aria-label="Close">{{trans('employee.file_not_found')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--------------------------------end  driving_licence ------------------------>

    </div>
</div>
