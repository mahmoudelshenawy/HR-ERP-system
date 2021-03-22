
@extends('layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">

        @include('layouts.partials.flash-messages')
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
                    <div class="view-icons" style="display: inline-block">
                        <a href="{{url('employees/list_2')}}" class="grid-view btn btn-link active"><i class="fa fa-lis"></i></a>
                        <a href="{{url('employees')}}" class="grid-view btn btn-link "><i class="fa fa-th"></i></a>
                        <a href="{{url('employees/list')}}" class="list-view btn btn-link " id="employee_list"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#branch_select"><i class="fa fa-plus"></i>
                            {{__('employee.add_employee')}}</a>
                    </div>
                </div>
            </div>

            <!-- /Page Header -->

            <!-- /Search Filter -->
<i class="fa fa-print"></i>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive" >
                        <table id="myTable" class="table" >
                            <thead>
                            <tr> <th>{{trans('employee.code')}}</th>
                                <th>{{trans('employee.name')}}</th>
                                <th>{{trans('employee.branch')}}</th>
                                <th>{{trans('employee.manager_name')}}</th>
                                <th>{{trans('employee.guarantor')}}</th>
                                <th>{{trans('employee.hiring_date')}}</th>
                                <th>{{trans('employee.country')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employeeData as $employee)
                                <tr>
                                    <td>{{$employee->code}}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="{{url('employees/'.$employee->id)}}" class="avatar"><img alt="" src="{{($employee->employee_img ? asset('uploads/files/employees/code/'.$employee->code.'/'.$employee->employee_img) : '') }}" style="max-height: 100%"></a>
                                            <a href="{{url('employees/'.$employee->id)}}">  {{$employee->employee_name}}<span style="color: #ff9b44">{{ DB::table('business_jobs')->where('id',$employee->job_id)->value('name') }}  </span>
                                                <span style="color: #721c24">{{( $employee->phone_1 ? $employee->phone_1 :'')}}</span>
                                            </a>
                                        </h2>
                                    </td>
                                    <td class="small text-info">{{ DB::table('business_branches')->find($employee->branch_id)->name }}</td>
                                    <td class="small">@if ($employee->manager_id) {{DB::table('employee_general_data')->where('id','=',$employee->manager_id)->value('employee_name') }}@endif </td>
                                    <td class="small text-dark">@if($employee->guarantor_id) {{DB::table('guarantors')->where('id','=',$employee->guarantor_id)->value('name')}} @endif</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a>@if($employee->hiring_date) {{$employee->hiring_date}} @endif </a>
                                            <a><span class="text-danger">@if($employee->contract_ending_date) {{$employee->contract_ending_date}} @endif</span></a>
                                        </h2>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a style="min-width: 120px" href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle border-secondary" data-toggle="dropdown" aria-expanded="false">@if($employee->country_id) {{DB::table('countries')->where('id','=',$employee->country_id)->value('name')}}
                                                <img src="https://www.countryflags.io/{{DB::table('countries')->where('id',$employee->country_id)->value('img')}}/shiny/16.png">@endif
                                            </a>
                                            <div class="dropdown-menu border-success">
                                                <a class="dropdown-item" href="#"> <span><i class="fa fa-dot-circle-o text-danger"></i>@if($employee->national_id_number)  {{trans('employee.national_id')}}</span>  {{ $employee->national_id_number}} @endif</a>
                                                <a class="dropdown-item" href="#"><span><i class="fa fa-dot-circle-o text-warning"></i>@if($employee->residency_number) {{trans('employee.residence_number')}}</span>  {{ $employee->residency_number}} @endif</a>
                                                <a class="dropdown-item" href="#"><span><i class="fa fa-dot-circle-o text-info"></i>@if($employee->passport_number) {{trans('employee.passport_number')}}</span>  {{ $employee->residency_number}} @endif</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        @include('employees.employee_add_parts.branch_select')
    </div>
    <!-- /Page Wrapper -->

@endsection

@section('css')
    <style>

        .active {
            display: block;
        }
    </style>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({

                searchPanes:{
                    cascadePanes: true,
                    viewTotal: true,
                    controls: false,
                    emptyMessage: "<i><b> {{trans('general.none')}} </b></i>",

                },
                dom: 'Bfrtip',
                language:{
                    searchPanes:{
                        count: '{total} {{trans('general.employee_found')}}',
                        countFiltered: '{shown} / {total}',
                        clearMessage: "{{trans('general.clear_search')}}",
                        collapse: {0: "{{trans('general.advanced_search')}}", _: 'Search Options (%d)'}
                    },
                },

                buttons:[
                    {
                        extend: 'searchPanes',
                        className: 'my-btn btn-custom btn',
                    },
                    {
                        text: "{{__('employee.export')}}",
                        className: 'my-btn btn-warning btn ',
                        action: function ( e, dt, node, config ) {
                            window.location.href = "{{url('employees/export-data')}}"
                        }
                    },
                    {
                        extend: 'colvis',
                        text: "{{__('general.column_visibility')}}",
                        columnText: function ( dt, idx, title ) {
                            return (idx+1)+': '+title;
                        },
                        className: 'my-btn btn-secondary btn ',
                    },
                ],
            });
            oTable = $('#myTable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
            $('#mySearchText').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })

            $(".my-btn").removeClass( "dt-button" ).addClass( "btn-lg");
            $("#myTable_filter").style.display = 'none';
            $('.dt-buttons').insertBefore('div.filter-row').addClass( "btn-group");

        } );
    </script>
@endsection
