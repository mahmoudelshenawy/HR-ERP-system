<div id="branch_basic_data" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.branch_data')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('business-setup/business-branch/' . $branch->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="profile-img-wrap edit-img">
                            <img id="blah" class="inline-block" src=@if($branch->logo)
                            {{asset('uploads/files/branches'.$branch->name.'/images/'.$branch->logo)}}@else
                            {{asset('img/ArSoftware..gif')}} @endif alt="user">
                            <div class="fileupload btn">
                                <span class="btn-text">{{__('general.edit')}}</span>
                                <input class="upload" type="file" name="logo" id="imgInp" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('business-setup.branch')}}
                                    </label>
                                    <select class="js-example-matcher-start" name="type_id" >
                                        <option  selected  value="{{$branch->business_type_id}}"> {{DB::table('business_types')->where('id',$branch->business_type_id)->value('name')}}</option>
                                        @foreach($businessType as $type)

                                            <option  value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('business-setup.branch')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{$branch->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('business-setup.branch_manager')}}</label>
                                    <select class="js-example-matcher-start" name="manager_id">
                                        {{-- <option selected value="{{$branch->manager_id}}" disabled>{{DB::table('employee_general_data')->where('id',$branch->manager_id)->value('employee_name')}}</option> --}}
                                        @foreach($employees as $employee)
                                            <option  value="{{$employee->id}}" {{$branch->manager_id == $employee->id ? 'selected' : ''}}>{{$employee->employee_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('business-setup.branch_phone')}}</label>
                                    <input class="form-control" type="tel" name="phone" value="{{$branch->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('business-setup.branch_email')}}<span class="text-danger"></span></label>
                                    <input class="form-control" type="email" name="email" value="{{$branch->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="col-md-8 offset-md-2 form-group" >
                                    <label for="address_address " class="" >{{__('business-setup.branch_address')}}</label>
                                    <input type="text" id="address-input" name="adress" class="form-control map-input" value="{{$branch->address}}">
                                <input type="hidden" name="latitude" id="address-latitude" value="{{$branch->latitude}}" />
                                <input type="hidden" name="longitude" id="address-longitude" value="{{$branch->longitude}}" />
                                </div>
                                <div id="address-map-container" style="width:100%;height:400px ;">
                                    <div style="width: 100%; height: 100%" id="address-map"></div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">{{__('general.submit')}}</button>
                        </div>
                    </form>
                        </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
<script src="{{asset('js/mapInput.js')}}"></script>
@endpush
