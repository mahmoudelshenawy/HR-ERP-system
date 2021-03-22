<!-- add contract type Modal -->
<div id="add_contract_type" class="modal custom-modal fade" role="dialog" >
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.addContractType')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('business-setup/contract-type/')}}">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Contract Type Name')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" >
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Statue')}} <span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="statue"  value="">
                                    <option selected="selected" value="1">{{__('general.statue Active')}}</option>
                                    <option value="0">{{__('general.statue Inactive')}}</option>
                                </select>
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

<!-- /add type Modal -->
