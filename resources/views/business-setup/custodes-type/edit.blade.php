<!-- edit business type Modal -->
<div id="edit_custady_type{{$id}}" class="modal custom-modal fade" role="dialog" >
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('business-setup/custodys-type/'.$id)}}">
                    <input name="_method" type="hidden" value="PUT">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="col-form-label">{{__('employee.custady_type')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <input class="form-control" type="text" name="custadyType"  value="{{$name}}">
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
<!-- /edit business type Modal -->
