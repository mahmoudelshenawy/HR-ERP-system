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
                        <h3 class="page-title">{{__('time_management.holidays')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('time_management.holidays')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> {{__('time_management.add_holiday')}} </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card-body card">
                <div class="col-md-12 ">
                    <div class="table-responsive ">
                        {!! $dataTable->table(['class'=>' dataTable table-radius table-nowrap '],true) !!}
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Wrapper -->
    @include('time_management.holidays.add')
<!-- /Main Wrapper -->
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
