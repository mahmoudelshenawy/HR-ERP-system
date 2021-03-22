@extends('layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper" style="min-height: 625px;">
        <div class="content container-fluid">
            @include('layouts.partials.flash-messages')
            <form action="{{url('employees/add')}}" method="POST"  enctype="multipart/form-data">
                <input type="hidden" name="branch_id" value="{{$branch}}">
                @csrf()
               <div class="col-3">
                   <span class="title">{{__('employee.add_employee')." :"}}</span>
                   <span class="text-muted">{{__('employee.branch')}}</span>
                   <small class="text-danger">{{DB::table('business_branches')->where('id', request()->branch)->value('name')}}</small>
               </div>
                <div class="avatar-upload" >
                    <div class="avatar-edit" >
                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="employee_img"/>
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview" >
                        <div id="imagePreview" style="background: url({{asset('img/employee.png')}}); background-size: cover">
                        </div>
                    </div>
                </div>
                 <div class="card tab-box col-10 offset-md-1">
                    <div class="row user-tabs">
                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs text-center">
                            <ul class="nav nav-tabs nav-tabs-bottom" >
                                <li class="nav-item"><a href="#personal_data" data-toggle="tab" class="nav-link active " >{{__('employee.personal_data')}}<small class="text-purple"><i class="fa fa-info-circle"></i></small></a></li>
                                <li class="nav-item"><a href="#file_manager" data-toggle="tab" class="nav-link  " >{{__('employee.file_manager')}} <small class="text-purple"><i class="fa fa-files-o"></i></small> </a></li>
                                <li class="nav-item"><a href="#work_data" data-toggle="tab" class="nav-link"> {{trans('employee.work_data')}} <small class="text-danger small"> (Admin Only)  <i class="text-purple fa fa-file-pdf-o"></i></small></a></li>
                                <li class="nav-item text-center "><a href="#insurance_data" data-toggle="tab" class="nav-link text-center " > {{trans('employee.insurance')}} <small class="text-purple"><i class="fa fa-hospital-o"> </i></small></a></li>
                                <li class="nav-item text-center "><a href="#bank_data" data-toggle="tab" class="nav-link text-center " > {{trans('employee.bank_data')}} <small class="text-purple"><i class="fa fa-bank"> </i></small></a></li>
                            </ul>
                        </div>
                     </div>
                 </div>

                <div class="tab-content">  <!--  content start ---->
                        @include('employees.employee_add_parts.personal_data')
                        @include('employees.employee_add_parts.file_manager')
                        @include('employees.employee_add_parts.work_data')
                        @include('employees.employee_add_parts.insurance_data')
                        @include('employees.employee_add_parts.bank_data')
                    <div class="submit-section" style="padding-bottom: 20px">
                        <input type="submit" class="btn btn-primary btn-lg" value="{{__('general.submit')}}"  style="min-width: 150px">
                    </div>
                </div>
            </form>
        </div><!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
@endsection



@section('css')
    <style>
        svg:not(:root) {
            overflow: hidden;
        }
        .main-wrapper {
            max-width: 1170px;
            margin: 0 auto;
            text-align: center;
        }
        .upload-main-wrapper {
            width: 220px;
            margin: 0 auto;
        }
        .file-upload-name {
            margin: 4px 0 0 0;
            font-size: 12px;
        }
        .upload-wrapper {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin: 40px auto 0;
            position: relative;
            cursor: pointer;
            background-color: #bcaef5;
            padding: 8px 10px;
            border-radius: 10px;
            overflow: hidden;
            transition: 0.2s linear all;
            color: #fff;
        }
        .upload-wrapper input[type="file"] {
            width: 100%;
            position: absolute;
            left: 0;
            right: 0;
            opacity: 0;
            top: 0;
            bottom: 0;
            cursor: pointer;
            z-index: 1;
        }
        .upload-wrapper > svg {
            width: 50px;
            height: auto;
            cursor: pointer;
        }
        .upload-wrapper.success > svg {
            transform: translateX(-200px);
        }
        .upload-wrapper.uploaded {
            transition: 0.2s linear all;
            width: 60px;
            border-radius: 50%;
            height: 60px;
            text-align: center;
        }
        .upload-wrapper .file-upload-text {
            position: absolute;
            left: 80px;
            opacity: 1;
            visibility: visible;
            transition: 0.2s linear all;
        }
        .upload-wrapper.uploaded .file-upload-text {
            text-indent: -999px;
            margin: 0;
        }
        .file-success-text {
            opacity: 0;
            transition: 0.2s linear all;
            visibility: hidden;
            transform: translateX(200px);
            position: absolute;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .file-success-text svg {
            width: 25px;
            height: auto;
        }
        .file-success-text span {
            margin-left: 15px;
        }
        .upload-wrapper.success .file-success-text {
            opacity: 1;
            visibility: visible;
            transform: none;
        }
        .upload-wrapper.success.uploaded .file-success-text {
            opacity: 1;
            visibility: visible;
            transform: none;
        }
        .upload-wrapper.success.uploaded .file-success-text span {
            display: none;
        }
        .upload-wrapper .file-success-text circle {
            stroke-dasharray: 380;
            stroke-dashoffset: 380;
            transition: 1s linear all;
            transition-delay: 1.4s;
        }
        .upload-wrapper.success .file-success-text circle {
            stroke-dashoffset: 0;
        }
        .upload-wrapper .file-success-text polyline {
            stroke-dasharray: 380;
            stroke-dashoffset: 380;
            transition: 1s linear all;
            transition-delay: 2s;
        }
        .upload-wrapper.success .file-success-text polyline {
            stroke-dashoffset: 0;
        }
        .upload-wrapper.success .file-upload-text {
            -webkit-animation-name: bounceOutLeft;
            animation-name: bounceOutLeft;
            -webkit-animation-duration: 0.2s;
            animation-duration: 0.2s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
        @-webkit-keyframes bounceOutLeft {
            20% {
                opacity: 1;
                -webkit-transform: translate3d(20px, 0, 0);
                transform: translate3d(20px, 0, 0);
            }
            to {
                opacity: 0;
                -webkit-transform: translate3d(-2000px, 0, 0);
                transform: translate3d(-2000px, 0, 0);
            }
        }
        @keyframes bounceOutLeft {
            20% {
                opacity: 1;
                -webkit-transform: translate3d(20px, 0, 0);
                transform: translate3d(20px, 0, 0);
            }
            to {
                opacity: 0;
                -webkit-transform: translate3d(-2000px, 0, 0);
                transform: translate3d(-2000px, 0, 0);
            }
        }

    </style>
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
            right: 20px;
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
            background-color: #7f8a9a   ;
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
    @foreach($files as $file)

        <script>
            $(document).ready(function(){
                $('#{{$file}}_input').change(function() {
                    var filename = $(this).val();
                    $('#{{$file}}_name').html(filename);
                    if(filename!=""){
                        setTimeout(function(){
                            $('.upload-wrapper_{{$file}}').addClass("uploaded");
                        }, 600);
                        setTimeout(function(){
                            $('.upload-wrapper_{{$file}}').removeClass("uploaded");
                            $('.upload-wrapper_{{$file}}').addClass("success");
                        }, 1600);
                    }
                });
            });
        </script>
    @endforeach
    <script>
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
@endsection
