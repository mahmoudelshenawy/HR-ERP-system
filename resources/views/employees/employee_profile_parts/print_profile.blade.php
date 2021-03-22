@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{__('employee.employees')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('employee.employees')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white" id='btn' value='Print' onclick='printDiv();'>Print</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body"  id="DivIdToPrint">
                            <h4 class="payslip-title">{{strtolower($employee->employee_name)}}</h4>
                            <img class="inv-logo" alt="{{$employee->employee_name}}" src="@if($employee->employee_img)
                            {{asset('uploads/files/employees/code/'.$employee->code.'/'.$employee->employee_img)}}@else
                            {{asset('img/user.jpg')}}"@endif style="border-radius: 100%">
                            <div class="row">
                                <div class="col-sm-3 ">

                                    <ul class="list-unstyled">
                                        <li{{ ($employee->employee_name_en )? $employee->employee_name_en : ''}}</li>
                                        <li>{{($employee->employee_short_name)? "(".$employee->employee_short_name.")": ''}}</li>
                                        <li class="text-uppercase">{{ trans('employee.code').' : '. ( ($employee->code)? $employee->code :'' )}}</li>
                                        <li>{{' '.trans('employee.hiring_date')}} : <span>@if( ($employee->hiring_date)){{ $employee->hiring_date}}@endif</span></li>
                                        <li><h5 class="mb-0"><strong> {{DB::table('business_jobs')->where('id',$employee->job_id)->value('name')}}</strong></h5></li>
                                        <li>{{DB::table('business_branches')->find($employee->branch_id)->name }}</li>
                                        <li><small>{{ trans('employee.manager_name')  .":" }}</small> {{($employee->manager_id) ? DB::table('employee_general_data')->where('id',$employee->manager_id)->value('employee_name') : ''}}</li>
                                        <li>
                                            <div class="title">{{trans('employee.guarantor')." : "}}</div>
                                            <div class="text">
                                                <a class="text-info" href="#" >
                                                    {{($employee && $employee->guarantor_id)?DB::table('guarantors')->where('id', $employee->guarantor_id)->value('name'): ''}}
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-3">
                                        <ul class="list-unstyled" >
                                            <li >
                                                <div style="display: inline-block" class="title ">{{trans('employee.phone')." : "}}</div>
                                                <div style="display: inline-block" class="text "><a  href="tel:{{ $employee->phone_1 }}">{{( ($employee->phone_1))? $employee->phone_1 : ""}} </a></div>
                                                <div style="display: inline-block" class="text"><a  href="tel:{{ $employee->phone_1 }}"> @if($employee->phone_1 )  @endif</a></div>
                                                <div style="display: inline-block" class="text"><a target="_blank" href="https://api.whatsapp.com/send?phone={{ $employee->phone_1 }}">@if($employee->phone_1 )@endif </a></div>
                                            </li>
                                            <li>
                                                <div style="display: inline-block" class="title ">{{trans('employee.phone2')." : "}}</div>
                                                <div style="display: inline-block" class="text"><a  href="tel:{{ $employee->phone_2 }}">{{( ($employee->phone_2))? $employee->phone_2 : ""}} </a></div>
                                                <div style="display: inline-block" class="text"><a  href="tel:{{ $employee->phone_2 }}"> @if($employee->phone_2 )  @endif</a></div>
                                                <div style="display: inline-block" class="text"><a target="_blank" href="https://api.whatsapp.com/send?phone={{ $employee->phone_2 }}">@if($employee->phone_2 )</i>@endif </a></div>
                                            </li>
                                            <li >
                                                <div style="display: inline-block" class="title">{{trans('employee.email')." : "}} </div>
                                                <div style="display: inline-block" class="text"><a href="mailto:{{$employee->email }}">{{( ($employee->email))? $employee->email : ""}}</div>
                                            </li>
                                            <li >
                                                <div style="display: inline-block" class="title text-dark">{{trans('employee.country') . " : "}}</div>
                                                <div style="display: inline-block" class="text">
                                                    <a style="min-width: 120px" target="_blank" href="https://www.google.com/search?q={{DB::table('countries')->where('id',$employee->country_id)->value('name')}}">@if($employee->country_id) {{DB::table('countries')->where('id','=',$employee->country_id)->value('name')}}
                                                        <img src="https://www.countryflags.io/{{DB::table('countries')->where('id',$employee->country_id)->value('img')}}/shiny/16.png">
                                                        @endif
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title" style="display: inline-block">{{trans('employee.religion') . " : "}}</div>
                                                <div class="text"  style="display: inline-block">{{($employee->religion)? $employee->religion: ''}} </div>
                                            </li>
                                            <li>
                                                <div class="title" style="display: inline-block">{{trans('employee.birth_day')." : "}}</div>
                                                <div class="text" style="display: inline-block">{{( ($employee->birth_date))?  $employee->birth_date : "  "}} </div>
                                            </li>
                                            <li >
                                                <div style="display: inline-block" class="title">{{trans('employee.address'). " : "}}</div>
                                                <div style="display: inline-block" class="text"><a  target="_blank" href="https://www.google.com/maps/place/"{{ $employee->address }}>{{( ( $employee->address ))? $employee->address : ""}}</a></div>
                                                <div class="title" >{{trans('employee.birth_place')." : "}}</div>
                                                <div class="text" style="display: inline-block"  target="_blank" href="https://www.google.com/maps/place/"{{ $employee->birth_place }}>{{($employee->birth_place)? $employee->birth_place: ''}} </div>
                                            </li>

                                        </ul>

                                </div>
                                <div class="col-sm-3">
                                        <ul class="list-unstyled" >
                                            <li>
                                                <div class="title" style="display: inline-block">{{trans('employee.contract_type')}}</div>
                                                <div class="text" style="display: inline-block">{{($employee->contract_types_id)?  DB::table('contract_types')->where('id',$employee->contract_types_id)->value('name') : ''}} </div>
                                            </li>

                                            <li>
                                                <div class="title" style="display: inline-block">{{trans('employee.residency_job')}}</div>
                                                <div class="text" style="display: inline-block">{{($employee->residency_job) ?  $employee->residency_job : ''}}</div>
                                            </li>

                                            <li>
                                                <div class="title" style="display: inline-block">{{trans('employee.basic_salary')}}</div>
                                                <div class="text" style="display: inline-block">{{($employee->basic_salary)? $employee->basic_salary: ''}} </div>
                                            </li>
                                            <li>
                                                <div class="title small " style="display: inline-block">{{trans('employee.variable_pay')}}</div>
                                                <div class="text small" style="display: inline-block">{{($employee->variable_pay)? $employee->variable_pay : ''}} </div>
                                            </li>

                                            <li>
                                                <div class="title" style="display: inline-block">{{trans('employee.hiring_date')}}</div>
                                                <div class="text text-success" style="display: inline-block">{{($employee->hiring_date) ? $employee->hiring_date : ''}}</div>
                                            </li>

                                                <li>
                                                    <div class="title" style="display: inline-block">{{trans('employee.contract_starting_date')}}</div>
                                                @if($employee->contract_starting_date)
                                                    <div class="text" style="display: inline-block">{{($employee->contract_starting_date)?  $employee->contract_starting_date  : ''}} </div>
                                                    @endif
                                                </li>

                                                <li>
                                                    <div class="title" style="display: inline-block">{{trans('employee.contract_ending_date')}}</div>
                                                @if($employee->contract_ending_date)
                                                    <div class="text text-danger" style="display: inline-block"> {{($employee->contract_ending_date)? $employee->contract_ending_date  : ''}} </div>
                                                    @endif
                                                </li>
                                            <li>
                                                <div class="title" style="display: inline-block">{{trans('employee.attendable')}}</div>
                                                <div class="text text-danger" style="display: inline-block"> {{($employee->attendable ==1 )? trans('general.yes') : trans('general.no')}} </div>
                                            </li>
                                            <li>
                                                <div class="title" style="display: inline-block">{{trans('employee.annual_vacation')}}</div>
                                                <div class="text text-danger" style="display: inline-block"> {{($employee->annual_vacation ==1 )? trans('general.yes') : trans('general.no')}} </div>
                                            </li>
                                            <li>
                                                <div class="title" style="display: inline-block">{{trans('employee.end_service_reward')}}</div>
                                                <div class="text text-danger" style="display: inline-block"> {{($employee->end_service_reward ==1 )? trans('general.yes') : trans('general.no')}} </div>
                                            </li>

                                        </ul>

                                </div>
                                <div class="col-sm-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <div class="title" style="display: inline-block">{{trans('employee.employee_social_insurance_statue')}}</div>
                                            <div class="text" style="display: inline-block">
                                                @if($employee->employee_social_insurance_statue)
                                                    <div class="text-success "  style="display: inline-block">{{trans('general.yes')}}</div>
                                                @else
                                                    <div class="text-danger"  style="display: inline-block">{{trans('general.no')}}</div>
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title" style="display: inline-block">{{trans('employee.employee_social_insurance_number')}}</div>
                                            <div class="text" style="display: inline-block">
                                                {{
                                                 ($employee->employee_social_insurance_number)? $employee->employee_social_insurance_number
                                               : trans('employee.no_data')}}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title" style="display: inline-block">{{trans('employee.socialinsurance_join_date')}}</div>
                                            <div class="text-info" style="display: inline-block;color: red">
                                                {{
                                                 ($employee->socialinsurance_join_date)? $employee->socialinsurance_join_date
                                          : trans('employee.no_data')}}
                                            </div>
                                        </li>
                                        <li >
                                            <div class="title"  style="display: inline-block">{{trans('employee.insurance_statue')}}</div>
                                            @if($employee->employee_medical_insurance_statue)
                                                <div class="text-success "  style="display: inline-block">{{trans('general.yes')}}</div>
                                            @else
                                                <div class="text-danger"  style="display: inline-block">{{trans('general.no')}}</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title" style="display: inline-block">{{trans('employee.medical_insurance_provider')}}</div>
                                            <div class="text" style="display: inline-block">{{
                       ( $employee->medical_insurance_id)?
                          DB::table('medical_insurances')->where('id',$employee->medical_insurance_id)->value('name')  :
                          trans('employee.no_data')}}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title" style="display: inline-block">{{trans('employee.medical_insurance_type')}}</div>
                                            <div class="text" style="display: inline-block">
                                                {{
                                             ($employee->medical_insurance_type)? $employee->medical_insurance_type
                                            : trans('employee.no_data')
                                            }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title" style="display: inline-block">{{trans('employee.medical_insurance_number')}}</div>
                                            <div class="text-secondary" style="display: inline-block">
                                                {{
                                             ($employee->medical_insurance_number)? $employee->medical_insurance_number
                                            : trans('employee.no_data')
                                            }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title" style="display: inline-block">{{trans('employee.medical_insurance_start_data')}}</div>
                                            <div class="text-info" style="display: inline-block">
                                                {{
                                             ($employee->medical_insurance_start_data)? $employee->medical_insurance_start_data
                                            : trans('employee.no_data')
                                            }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title" style="display: inline-block">{{trans('employee.medical_insurance_end_data')}}</div>
                                            <div class="text-danger" style="display: inline-block">
                                                {{
                                                 ($employee->medical_insurance_end_data)? $employee->medical_insurance_end_data
                                          : trans('employee.no_data')}}
                                            </div>
                                        </li>


                                    </ul>

                                </div>
                            </div>
<hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>{{trans('employee.national_card')}}</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td><strong>{{trans('employee.national_id')}}</strong> <span class="float-right">{{($employee->national_id_number)? $employee->national_id_number: ''}} </span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{trans('employee.national_id_expiry_date')}}</strong> <span class="float-right">{{ $employee->national_id_expiry_date ?  $employee->national_id_expiry_date: '' }}</span></td>
                                            </tr>
                                            <tr>
                                                <td>

                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>{{trans('employee.passport')}}</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td><strong>{{trans('employee.passport_number')}}</strong> <span class="float-right">{{($employee->passport_number)? $employee->passport_number: ''}} </span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{trans('employee.start_date')}}</strong> <span class="float-right">{{( ($employee->passport_start_date))?  $employee->passport_start_date: "  "}} </span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{trans('employee.expiry_date')}}</strong> <span class="float-right"><strong>{{ $employee->passport_expiry_date ?  $employee->passport_expiry_date: '' }}</strong></span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>{{__('employee.residence')}}</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td><strong>{{trans('employee.residence_number')}}</strong> <span class="float-right">{{($employee->residency_number)? $employee->residency_number: ''}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{trans('employee.start_date')}}</strong> <span class="float-right">{{( ($employee->residency_start_date))?  $employee->residency_start_date: "  "}} </span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{trans('employee.expiry_date')}}</strong> <span class="float-right">{{ $employee->residency_expiry_date ?  $employee->residency_expiry_date: '' }}</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>{{__('employee.healthy_certificate')}}</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td><strong>{{trans('employee.healthy_certificate_number')}}</strong> <span class="float-right">{{($employee->healthy_certificate)? $employee->healthy_certificate: ''}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{trans('employee.cancel_date')}}</strong> <span class="float-right">{{( ($employee->healthy_certificate_cancel_date))?  $employee->healthy_certificate_cancel_date: "  "}}  </span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{trans('employee.expiry_date')}}</strong> <span class="float-right">{{ $employee->healthy_certificate_expiry_date ?  $employee->healthy_certificate_expiry_date: '' }}</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>{{__('employee.driving_licence')}}</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td><strong>{{trans('employee.driving_licence_number')}}</strong> <span class="float-right">{{($employee->driving_licence_number)? $employee->driving_licence_number: ''}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{trans('employee.expiry_date')}}</strong> <span class="float-right">{{ $employee->driving_licence_expiry_date ?  $employee->driving_licence_expiry_date: '' }} </span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>{{__('employee.experince_education')}}</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td><strong>{{trans('employee.educational_qualification')}}</strong> <span class="float-right">{{$employee->educational_qualification? $employee->educational_qualification: ""}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{trans('employee.educational_qualification_year')}}</strong> <span class="float-right">{{$employee->educational_qualification_year?$employee->educational_qualification_year:''}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ trans('employee.experince')}}</strong> <span class="float-right">{{$employee->experience ? $employee->experience:""}}</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->

@endsection
@section('js')
    <script>
        function printDiv()
        {

            var divToPrint=document.getElementById('DivIdToPrint');

            var newWin=window.open('','Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

            newWin.document.close();

            setTimeout(function(){newWin.close();},10);

        }
    </script>
@endsection
