<div class="card mb-0">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                    <div class="profile-img-wrap">
                        <div class="profile-img">
                            <a href="#"><img alt="{{$employee->employee_name}}" src="@if($employee->employee_img)
                                {{asset('uploads/files/employees/code/'.$employee->code.'/'.$employee->employee_img)}}@else
                                {{asset('img/user.jpg')}}"@endif">
                            </a>
                        </div>
                    </div>

                    <div class="profile-basic">
                        <div class="row">

                            <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name m-t-0 mb-0">{{strtolower($employee->employee_name)}}</h3>
                                    <small>
                                        <div class="text" style="display: inline-block">{{ ($employee->employee_name_en )? $employee->employee_name_en : ''}}</div>
                                    </small>
                                    <span class="text-warning ">
                                                     {{($employee->employee_short_name)? "(".$employee->employee_short_name.")": ''}}
                                                </span>
                                    <h6 class="text-muted">
                                        <small class="text text-danger" > {{ __('employee.code')}}</small>
                                        <div class="staff-id" style="display: inline-block"> {{ ( ($employee->code)? $employee->code :'' )}}</div><br>
                                    </h6>
                                    <div class="text-muted" style="display: inline-block"> {{DB::table('business_jobs')->where('id',$employee->job_id)->value('name')}}
                                        <small class="text-success">
                                            {{DB::table('business_branches')->find($employee->branch_id)->name}}
                                        </small>
                                    </div><br>
                                    <div class="small doj text-muted" style="display: inline-block">{{' '.trans('employee.hiring_date')}}
                                        <span class="text-muted" > @if( ($employee->hiring_date)){{ $employee->hiring_date}}@endif</span>
                                    </div><br>
                                    <div class="text-muted " style="display: inline-block" >
                                        {{($employee && $employee->gender)? trans('employee.'.$employee->gender)." ": ''}}
                                    </div>
                                    <div class="text-danger small">{{trans('employee.manager_name')}}</div>
                                    @if($employee->manager_id != null)
                                    <div class="text">
                                        <div class="avatar-box">
                                            <div class="avatar avatar-xs">
                                                <img src="{{( isset($employee->id) )? asset('uploads/files/employees/code/'. DB::table('employee_general_data')->where('id',$employee->manager_id)->value('code')).'/'. DB::table('employee_general_data')->where('id',$employee->manager_id)->value('employee_img'): ''}}" alt="">
                                            </div>
                                        </div>
                                        <a class="text-info" href="{{( isset($employee->id)) ? url('employees/'.$employee->manager_id): '#'}}" >
                                            {{( isset($employee->id)) ? DB::table('employee_general_data')->where('id',$employee->manager_id)->value('employee_name') : ''}}
                                        </a>
                                    </div>
                                    @else
                                        <div class="text-muted small">{{__('employee.no_manager')}}</div>
                                    @endif
                                    <div class="staff-msg"><a class="btn btn-success" href="{{url('employees/print-profile/'.$employee->id)}}" target="_blank">{{trans('employee.print_profile')}}</a></div>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li >
                                        <div style="display: inline-block" class="title ">{{trans('employee.phone')}}</div>
                                        <div style="display: inline-block" class="text "><a  href="tel:{{ $employee->phone_1 }}">{{( ($employee->phone_1))? $employee->phone_1 : ""}} </a></div>
                                        <div style="display: inline-block" class="text"><a target="_blank" href="https://api.whatsapp.com/send?phone={{ $employee->phone_1 }}">@if($employee->phone_1 )<i class="fa fa-whatsapp text-success"></i>@endif </a></div>
                                    </li>
                                    <li>
                                        <div style="display: inline-block" class="title ">{{trans('employee.phone2')}}</div>
                                        <div style="display: inline-block" class="text"><a  href="tel:{{ $employee->phone_2 }}">{{( ($employee->phone_2))? $employee->phone_2 : ""}} </a></div>
                                        <div style="display: inline-block" class="text"><a target="_blank" href="https://api.whatsapp.com/send?phone={{ $employee->phone_2 }}">@if($employee->phone_2 )<i class="fa fa-whatsapp text-success"></i>@endif </a></div>
                                    </li>
                                    <li >
                                        <div style="display: inline-block" class="title">{{trans('employee.email')}} </div>
                                        <div style="display: inline-block" class="text"><a href="mailto:{{$employee->email }}">{{( ($employee->email))? $employee->email : ""}}</a></div>
                                    </li>
                                    <li >
                                        <div style="display: inline-block" class="title">{{trans('employee.country')}}</div>
                                        <div style="display: inline-block" class="text">
                                            <a style="min-width: 120px" target="_blank" href="https://www.google.com/search?q={{DB::table('countries')->where('id',$employee->country_id)->value('name')}}" class="btn btn-white btn-sm btn-rounded border-secondary"  >@if($employee->country_id) {{DB::table('countries')->where('id','=',$employee->country_id)->value('name')}}
                                                <img src="https://www.countryflags.io/{{DB::table('countries')->where('id',$employee->country_id)->value('img')}}/shiny/16.png">
                                                @endif
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="title">{{trans('employee.religion')}}</div>
                                        <div class="text" style="display: inline-block">{{($employee->religion)? $employee->religion: ''}} </div>
                                    </li>
                                    <li>
                                        <div class="title">{{trans('employee.birth_day')}}</div>
                                        <div class="text-muted" style="display: inline-block">{{( ($employee->birth_date))?  $employee->birth_date: "  "}} </div>
                                    </li>
                                    <li >
                                        <div style="display: inline-block" class="title">{{trans('employee.address')}}</div>
                                        <div style="display: inline-block" class="text-muted">{{( ( $employee->address ))? $employee->address : ""}}</div>

                                    </li>
                                    <li>
                                        <div class="title">{{trans('employee.birth_place')}}</div>
                                        <div class="text-muted" style="display: inline-block" >{{($employee->birth_place)? $employee->birth_place: ''}} </div>
                                    </li>
                                    <li>
                                        <div class="title">{{trans('employee.guarantor')}}</div>
                                        <div class="text">
                                            <div class="avatar-box">
                                                <div class="avatar avatar-xs">
                                                    <img src="{{$employee->guarantor_id ? asset('uploads/files/guarantors/'.DB::table('guarantors')->where('id', $employee->guarantor_id)->value('code').'/'.DB::table('guarantors')->where('id', $employee->guarantor_id)->value('img')) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <a class="text-info" href="#" >
                                                {{($employee && $employee->guarantor_id)?DB::table('guarantors')->where('id', $employee->guarantor_id)->value('name'): ''}}
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
