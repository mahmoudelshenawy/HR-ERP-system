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
                        <h3 class="page-title">{{__('employee.inactive_employee')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('employee.inactive_employee')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_inactive"><i class="fa fa-plus"></i>
                            {{__('employee.new_inactive')}}</a>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->

            <div class="card-body card">
                <div class="col-md-12 ">
                    <div class="table-responsive ">
                        {!!  $dataTable->table(['class'=>' dataTable table-radius table-nowrap table'],true) !!}
                    </div>
                </div>
            </div>



        </div>
        <!-- /Page Content -->
        @include('employees.inactive_employee.add')
    </div>
    <!-- /Page Wrapper -->
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
