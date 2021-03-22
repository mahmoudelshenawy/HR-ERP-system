@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">{{trans('nav.over_time')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.over_time')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_over_time"><i class="fa fa-plus"></i>
                            {{__('time_management.add')}}</a>

                        <a href="#" class="btn add-btn" style="display: block ; margin-left : 10px" data-toggle="modal" data-target="#add_over_time_excel"><i class="fa fa-plus"></i>
                            {{__('time_management.upload_excel')}}</a>
                           
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
    </div>
@include('salary.over_time.add')
@include('salary.over_time.add_excel')
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}

    
@endpush
