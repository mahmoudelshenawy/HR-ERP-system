<!-- Add  guarantor Modal -->
<div id="add_guarantor" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.addGuarantor')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">
                <form method="post" action="{{url('business-setup/guarantor')}}" enctype="multipart/form-data" >
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor Code')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="guarantorCode" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="guarantorName" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor Phone')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="number" name="guarantorPhone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor Address')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="guarantorAddress">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor Image')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="file" name="guarantorImage">
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
<!-- /Add business branch Modal -->

