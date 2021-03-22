



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
                    <div class="view-icons">
                        <a href="{{url('employees')}}" class="grid-view btn btn-link "><i class="fa fa-th"></i></a>
                        <a href="{{url('employees/list')}}" class="list-view btn btn-link active" id="employee_list"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn " data-toggle="modal" data-target="#branch_select"><i class="fa fa-plus"></i>
                            {{__('employee.add_employee')}}</a>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->
            <div class="card-body card">
                <div class="col-md-12 ">
                    <div class="table-responsive ">
                        {!! $dataTable->table(['class'=>' dataTable table '],true) !!}
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
                body{
                    font-family: DejaVu Sans, sans-serif;
                }
            </style>
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush

