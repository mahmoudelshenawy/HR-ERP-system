@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">{{trans('nav.net_salary')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.net_salary')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        @if ($not_calculated)
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_net_salary"><i class="fa fa-plus"></i>
                            {{__('salary.calculate_net_salary')}}</a>
                        @endif
                       

                           
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card-body card">
                <div class="col-md-12 text-center">
                   @if ($not_calculated)
                       <h2 class="py-4">{{ trans('salary.salaries_not_calculated') }}</h2>
                   @endif
                </div>
            </div>

        </div>
    </div>

    @include('salary.net_salary.add')
@endsection
