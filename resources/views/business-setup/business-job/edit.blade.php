<!-- Edit job  Modal -->
<div id="edit_Job{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.editJob')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('business-setup/business-job/'.$id)}}" >
                   <input type="hidden" name="_method" value="PUT">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Departments')}} <span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="departmentName" >
                                    @foreach(\App\BusinessAdministration::with('businessBranch')->get() as $administration)
                                        <optgroup label="{{$administration->businessBranch->name}} {!!'&nbsp; &nbsp; &nbsp;'!!} {{$administration->name }}" >
                                            @foreach($administration->department->all() as $department)
                                                @if($department->id == $business_department_id)
                                                    <option selected="selected" value="{{$department->id}}"> {{$department->name}} </option>
                                                    @continue
                                                @endif
                                                <option  value="{{$department->id}}"> {{$department->name}} </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Job')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="jobName" value="{{$name}}">
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
<!-- /Add business department Modal -->

