<!-- edit business type Modal -->
<div id="edit_contract_type{{$id}}" class="modal custom-modal fade" role="dialog" >
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.editContractType')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('business-setup/contract-type/'.$id)}}">
                    <input name="_method" type="hidden" value="PUT">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Contract Type Name')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name"  value="{{$name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Statue')}} <span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start form-control" name="statue"  value="{{$statue}}">
                                    <option value="1">{{__('general.statue Active')}}</option>
                                    <option value="0">{{__('general.statue Inactive')}}</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div  class="submit-section" >
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /edit business type Modal -->
