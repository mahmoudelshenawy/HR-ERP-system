<!-- Add business adminstration Modal -->
<div id="add_business_administration" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.addBusinessAdministration')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" action="{{url('business-setup/business-administration')}}" >
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.branch')}} <span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="branchName[]" multiple>
                                    @foreach( \App\BusinessBranch::all() as $branch)
                                      <option  value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.administration')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="administrationName" >
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
<!-- /Add business administration Modal -->

