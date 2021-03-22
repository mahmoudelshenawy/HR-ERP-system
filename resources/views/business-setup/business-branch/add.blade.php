@extends('layouts.app')

@section('content')
    <div class="page-wrapper" >
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                    <div class="col-sm-12">
                        <h3 class="page-title">{{trans('business-setup.addBusinessBranch')}}</h3>
                </div>
            </div>
            <!-- menue Header -->
            <!-- /Page Header -->
@include('layouts.partials.flash-messages')
            <!-- /Page Header -->

        <div class="col-md-8 offset-md-2">

                <form method="post" action="{{url('business-setup/business-branch')}}" enctype="multipart/form-data" >
                    @csrf()
                    <div class="avatar-upload" >
                        <div class="avatar-edit" >
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="logo"/>
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview" >
                            <div id="imagePreview" style="background: url({{asset('img/ArSoftware..gif')}}); background-size: cover">
                            </div>
                        </div>
                    </div>
                    <div class="card tab-box">
                        <div class="row user-tabs">
                            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs text-center">
                                <ul class="nav nav-tabs nav-tabs-bottom" >
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">

                        <div id="basic" class="pro-overview tab-pane fade show active">
                            <div class="row" >
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('business-setup.branch_business_type')}}
                                            <span class="text-danger">*</span>
                                            @error('type_id')<small class="text-danger">{{$message}}</small>@enderror
                                        </label>
                                        <select class="js-example-matcher-start" name="type_id" >
                                            <option disabled selected>{{trans('general.select')}}</option>
                                            @foreach($businessType as $type)
                                                <option  value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected':''}}>{{$type->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('business-setup.branch')}} <span class="text-danger">*</span>
                                            @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                        </label>
                                        <input class="form-control @error('name') is-invalid @enderror " type="text"  name="name" value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('business-setup.branch_manager')}}</label>
                                        <select class="js-example-matcher-start" name="manager_id">
                                            <option selected value="" disabled>{{trans('employee.select')}}</option>
                                            @foreach($employees as $employee)
                                                <option value="{{$employee->id}}"  {{old('type_id') == $employee->id ? 'selected':''}}>{{$employee->employee_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('business-setup.branch_phone')}}
                                            @error('phone')<small class="text-danger">{{$message}}</small>@enderror
                                        </label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" value="{{old('phone')}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('business-setup.branch_email')}}<span class="text-danger"></span>
                                            @error('email')<small class="text-danger">{{$message}}</small>@enderror
                                        </label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="email" name="email" value="{{old('email')}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label ">{{__('business-setup.Branch Document')}}<span class="text-danger"></span>
                                            @error('documents')<small class="text-danger">{{$message}}</small>@enderror
                                        </label>
                                        <div class="container_file">
                                            <div class="button-wrap">
                                                <label class="button" for="upload">{{trans('business-setup.document_upload')}}</label>
                                                <input id="upload" type="file" name="documents">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-md-8 offset-md-2" >
                                        <label for="address_address " class="" >{{__('business-setup.branch_address')}}</label>
                                        <input type="text" id="address-input" name="adress" class="form-control map-input" >
                                        <input type="hidden" name="latitude" id="address-latitude" value="0" />
                                        <input type="hidden" name="longitude" id="address-longitude" value="0" />
                                    </div>
                                    <div id="address-map-container" style="width:100%;height:400px ;">
                                        <div style="width: 100%; height: 100%" id="address-map"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!---------------------------    weekly check in and check out times   ------------>
                        <div id="attentance_rules" class="tab-pane fade show">
                           <ul class="list-group col-12"  >
                                    @foreach($days as $day)
                                        <li class="list-group-item " style="background-color: transparent;border-bottom:1px solid gray" >
                                            <div class="row ">
                                                <div class="col-3">
                                                    <label >{{trans('general.'.$day)}}</label>
                                                    <input type="checkbox" id="{{$day}}" class="check" name="days[{{$day}}]" onchange="myFunction_{{$day}}()">
                                                    <label for="{{$day}}" class="checktoggle">checkbox</label>
                                                </div>
                                                <div id="check_time_{{$day}}" style="display: none" class="col-9">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <label for="">{{trans('employee.check_in')}}</label>
                                                            <input type="time" class="form-control text-success" name="check_in_{{$day}}"/>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="">{{trans('employee.check_out')}}</label>
                                                            <input type="time" class="form-control text-danger" name="check_out_{{$day}}"/>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="shift">{{trans('employee.shift')}}</label>
                                                           <select name="shift" class="form-control" id="shift">
                                                               <option value="1">{{ trans('employee.first_shift') }}</option>
                                                               <option value="2">{{ trans('employee.second_shift') }}</option>
                                                               <option value="2">{{ trans('employee.third_shift') }}</option>
                                                           </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                    @endforeach
                           </ul >
                        </div>


                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
@section('css')
    <style>
.container_file {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            width: 100%;
        }
        input[type="file"] {
            position: absolute;
            z-index: -1;
            top: 10px;
            right: 84px;
            font-size: 17px;
            color: #b8b8b8;
        }
        .button-wrap {
            position: relative;
        }
        .button {
            display: inline-block;
            padding: 12px 18px;
            cursor: pointer;
            border-radius: 5px;
            background-color: #8ebf42;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
        }
        /*  image upload style */
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 0px auto 30px auto;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #ffffff;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        .avatar-upload .avatar-edit input + label:after {
            content: "\f040";
            font-family: "FontAwesome";
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .avatar-upload .avatar-preview {
            width: 182px;
            height: 182px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>
@endsection
@section('js')
    @parent
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script src="{{asset('js/mapInput.js')}}"></script>
    @foreach($days as $day)
    <script>
        function myFunction_{{$day}}() {
            var x = document.getElementById("check_time_{{$day}}");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
/////////////////image upload script /////////////
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
    @endforeach
@endsection
