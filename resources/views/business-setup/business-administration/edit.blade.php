<!-- edit business administration Modal -->
<div id="edit_business_admininstration{{$id}}" class="modal custom-modal fade" role="dialog" >
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.editBusinessAdministration')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('business-setup/business-administration/'.$id)}}">
                    <input name="_method" type="hidden" value="PUT">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.branch')}} <span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="branchName">
                                    @foreach( \App\BusinessBranch::all() as $branch)
                                        @if($branch->id == $business_branche_id)
                                            <option selected="selected" value="{{$branch->id}}">{{$branch->name}}</option>
                                            @continue
                                        @endif
                                        <option  value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.administration')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="administrationName" value="{{$name}}" >
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
<!-- /edit business administration Modal -->
