@extends('layouts.app')
@section('content')
    <div class="page-wrapper" style="min-height: 625px; padding-top: 0px">
        <!-- Page Content -->
        <div class="content container-fluid">
        <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{__('user.users')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('user.users')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{url('users/create')}}" class="btn add-btn"><i class="fa fa-plus"></i>{{__('user.add')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
                <div class="card-body card">
                    <div class="col-md-12 ">
                        <div class="table-responsive ">
                            {{$dataTable->table(['class'=>' dataTable table-radius '],true)}}
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
@push('scripts')
    {{$dataTable->scripts()}}
@endpush




