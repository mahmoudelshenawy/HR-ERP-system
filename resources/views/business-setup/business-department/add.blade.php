<!-- Add   department Modal -->
<div id="add_administration_department" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title btn btn-outline-warning" >{{__('business-setup.addDepartment')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('business-setup/business-department')}}" >
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.administration')}} <span class="text-danger">*</span></label>
                                <select class="  form-control js-example-matcher-start" name="administrationName[]" multiple>
                                    @foreach($branches as $branch)
                                        <optgroup label="{{$branch->name}}">
                                            @foreach($branch->administration->where('business_branche_id',$branch->id) as $administration)
                                            <option  value="{{$administration->id}}" >{{$administration->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Department')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="departmentName" >
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

