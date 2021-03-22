<div id="add_fixed_allowance" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.fixed_allowance')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{url('business-setup/fixed_allowance')}}" >
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        
                        <div class="col-8 mx-auto">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.name')}}<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
