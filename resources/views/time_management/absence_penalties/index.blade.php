@extends('layouts.app')


@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">{{trans('nav.absence_penalties')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.absence_penalties')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_absent_penalty"><i class="fa fa-plus"></i>
                            {{__('time_management.add')}}
                        </a>
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
    @include('time_management.absence_penalties.add')


@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
