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
                        <h3 class="page-title">{{__('nav.custodys')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.custodys')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_custady"><i class="fa fa-plus"></i>
                            {{__('employee.add_custady')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- /Page Header -->
            <div class="card-body card">
                <div class="col-md-12 ">
                    <div class="table-responsive  ">
                        {!! $dataTable->table(['class'=>' dataTable  table '],true) !!}
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->

        @include('employees.custodys.add')

    </div>
    <!-- /Page Wrapper -->
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
