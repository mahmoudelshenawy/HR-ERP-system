@extends('layouts.app')

@section('content')
    <div class="page-wrapper " style="background-image: url({{asset('uploads/files/branches'.$branch->name.'/images/'.$branch->main_photo)}})">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">{{trans('business-setup.branch_details')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{$branch->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img alt=""
                                         @if($branch->logo)
                                         src="{{asset('uploads/files/branches'.$branch->name.'/images/'.$branch->logo)}}"></a>
                                        @else
                                            src="{{asset('img/ArSoftware..gif')}}"></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0" style="display: block">{{$branch->name}}</h3>
                                                <h6 class="text-muted" style="display: block">{{$branch->businessType->name}}</h6>
                                                <div class="text-success" style="display: block"><a href="tel:{{$branch->phone}}" class="text-secondary">{{$branch->phone?$branch->phone:trans('business-setup.no_phone_found')}}</a></div>
                                                <div class="text-success" style="display: block"><a href="mailto:{{$branch->email}}" class="text-blue">{{$branch->email?$branch->email:trans('business-setup.no_email_found')}}</a></div>
                                                <div class="small doj text-muted" style="display: block">{{__('general.created at')}}: {{$branch->created_at}}</div><br>
                                                <h6 class="text-muted" style="display: block">{{trans('business-setup.branch_manager')}}</h6>
                                                <div class="text" style="display: block">
                                                    <div class="avatar-box">
                                                        <div class="avatar avatar-xs">
                                                            <img alt="" src="{{asset('uploads/files/employees/code/'.DB::table('employee_general_data')->where('id',$branch->manager_id)->value('code').'/'.DB::table('employee_general_data')->where('id',$branch->manager_id)->value('employee_img') ) }}">
                                                        </div>
                                                    </div>
                                                    @if($branch->manager_id)
                                                    <a href="{{url('employees/'.DB::table('employee_general_data')->where('id',$branch->manager_id)->value('id'))}}">
                                                        <span> {{DB::table('employee_general_data')->where('id',$branch->manager_id)->value('employee_name')}}</span>
                                                    </a>
                                                    @else
                                                    {{trans('business-setup.no_manager')}}
                                                    @endif
                                                </div><br>
                                                <div class="staff-msg"><a class="btn btn-success" href="{{url('employees/add?branch='.$branch->id)}}">{{__('employee.add_employee')}}</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mapouter"><div class="gmap_canvas">
                                                    @if($branch->latitude and $branch->longitude)
                                                    <iframe width="506" height="305" id="gmap_canvas" src="https://maps.google.com/maps?q={{$branch->latitude}},{{$branch->longitude}}&hl=es&z=14&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                                    <a href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/"></a>
                                                    @else
                                                    <span class="text-danger">
                                                        {{__('business-setup.no_location_found')}}
                                                    </span>
                                                        <iframe width="506" height="305" id="gmap_canvas" src="https://maps.google.com/maps?q={{$branch->latitude}},{{$branch->longitude}}&hl=es&z=14&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                                        <a href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/"></a>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit d-flex">
                                    <a data-target="#branch_basic_data" data-toggle="modal" class="edit-icon ml-3" href="#"><i class="fa fa-pencil"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#attendence_list" data-toggle="tab" class="nav-link active">{{''}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

                <!--       edit parts             -->
                @include('business-setup.business-branch.branch_details_edit.basic_data')
                {{-- edit attendence rules --}}

@endsection
@section('css')
 <style>

     #map {
         height: 100%;
     }

 </style>
<style>
    .mapouter{position:relative;text-align:right;height:305px;width:506px;}
    .gmap_canvas {overflow:hidden;background:none!important;height:305px;width:506px;}
</style>
@endsection
@section('js')
    @parent
                    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
                    <script src="{{asset('js/mapInput.js')}}"></script>
@endsection
