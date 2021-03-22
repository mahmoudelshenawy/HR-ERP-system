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
                        <h3 class="page-title">{{__('time_management.attendance_rules')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('time_management.attendance_rules')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#employee_monthly_rules"><i class="fa fa-plus"></i>
                            {{__('time_management.add_monthly_rules')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <select class="js-example-matcher-start " id="employee_id" >
                            <option>{{__('employee.select_employee')}}</option>
                            @foreach(DB::table('employee_general_data')->where('statue','active')->get() as $employee)
                                <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3" >
                    <div class="form-group form-focus focused">
                        <div class="cal-icon">
                            <input type="text" id="day"  class="form-control floating datetimepicker" >
                        </div>
                        <label class="focus-label">{{trans('general.day')}}</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3" >
                    <div class="form-group form-focus focused ">
                        <div class="cal-icon">
                            <input type="text" id="month"  class="form-control floating datetimepicker_monthly" disabled value="{{date('m')}}" >
                        </div>
                        <label class="focus-label">{{trans('general.month')}}</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="btn btn-success btn-block" id="filter"> {{__('general.search')}} </a>
                </div>
            </div>
            <div class="card-body card">
                <div class="col-md-12 ">
                    <div class="table-responsive" id="employees_section">
                        <table class="table table-radius">
                            <thead>
                            <tr>
                                <th>{{trans('employee.employee_name')}}</th>
                                <th>{{trans('general.day')}}</th>
                                <th>{{trans('employee.check_in')}}</th>
                                <th>{{trans('employee.check_out')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($rules) >0 )
                                @foreach($rules as $rule)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{url('employees/'.DB::table('employee_general_data')->where('id',$rule->employee_id)->value('id'))}}" class="avatar">
                                                    <img style="max-height: 100%" src="{{ asset('uploads/files/employees/code/'.DB::table('employee_general_data')->where('id',$rule->employee_id)->value('code').'/'.DB::table('employee_general_data')->where('id',$rule->employee_id)->value('employee_img'))}}"></a>
                                                <a href="{{url('employees/'.DB::table('employee_general_data')->where('id',$rule->employee_id)->value('id'))}}">  {{DB::table('employee_general_data')->where('id',$rule->employee_id)->value('employee_name')}}<span style="color: #ff9b44"></span>
                                                    <span style="color: #721c24">{{( DB::table('employee_general_data')->where('id',$rule->employee_id)->value('phone_1')? DB::table('employee_general_data')->where('id',$rule->employee_id)->value('phone_1'):'')}}</span>
                                                </a>
                                            </h2>
                                        </td>
                                        <td>{{$rule->day}}</td>
                                        <td class="text-success">{{$rule->check_in?$rule->check_in : trans('time_management.holiday')}}</td>
                                        <td class="text-danger">{{$rule->check_out?$rule->check_out : trans('time_management.holiday')}}</td>
                                    </tr>
                                @endforeach
                            @else
                                {{trans('general.no_data')}}
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {!! $rules->links() !!}
        </div>

        <!-- /Page Content -->
        @include('time_management.attendance_rules.add')
    </div>
    <!-- /Page Wrapper -->
@endsection

@section('js')
    <script>

        $(document).ready(function (){
            $('#filter').click(function (e) {
                e.preventDefault()
                var day = $('#day').val()
                var month = $('#month').val()
                var employee_id = $('#employee_id').val()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : 'attendance-rules',
                    type: "post",
                    data: {
                        employee_id : employee_id,
                        day : day,
                        month : month,
                    },
                    success:function (data) {
                        $('#employees_section').empty();
                        $('#employees_section').append(data['html']);
                    }
                })
            })

        });


    </script>
@endsection

