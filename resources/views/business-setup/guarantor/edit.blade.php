<!-- Add  guarantor Modal -->
<div id="edit_guarantor{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.editGuarantor')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">
                <form method="post" action="{{url('business-setup/guarantor/'.$id)}}" enctype="multipart/form-data" >
                    <input type="hidden" name="_method" value="PUT">
                    <div class="avatar-upload" >
                        <div class="avatar-edit" >
                            <input type='file' id="imageUpload{{$id}}" accept=".png, .jpg, .jpeg" name="guarantorImage" value="{{$img}}"/>
                            <label for="imageUpload{{$id}}"></label>
                        </div>
                        <div class="avatar-preview" >
                            <div id="imagePreview{{$id}}" style="background: url({{($img ? asset('uploads/files/guarantors/'.$name.'/'.$img) : asset('img/employee.png') ) }}); background-size: cover">
                            </div>
                        </div>
                    </div>
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor Code')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="guarantorCode"  value="{{$code}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="guarantorName"  value="{{$name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor Phone')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="number" name="guarantorPhone" value="{{$phone}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor Address')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="guarantorAddress" value="{{$address}}">
                            </div>
                        </div>


                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add   Modal -->


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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview{{$id}}').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview{{$id}}').hide();
                    $('#imagePreview{{$id}}').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload{{$id}}").change(function() {
            readURL(this);
        });
    </script>
@endsection
