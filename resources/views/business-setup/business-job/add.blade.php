<!-- Add   job  Modal -->
<div id="add_Job" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.addJob')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('business-setup/business-job')}}" >
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Departments')}} <span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="departmentName[]" multiple>
                                    @foreach(\App\BusinessAdministration::with('businessBranch')->get() as $administration)
                                        <optgroup label="{{$administration->businessBranch->name}} {!!'&nbsp; &nbsp; &nbsp;'!!} {{$administration->name }}" >
                                            @foreach($administration->department->all() as $department)
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
                                <input class="form-control" type="text" name="jobName" >
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

