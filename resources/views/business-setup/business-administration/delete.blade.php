<!-- Delete business administration Modal -->
<div class="modal custom-modal fade" id="delete_business_admininstration{{$id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>{{__('general.delete')." ". $name}}</h3>
                    <p>{{__('general.daleteWarning')}}</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <form method="post" action="{{url('business-setup/business-administration/'.$id)}}">
                                @csrf()
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="submit"  class="btn btn-primary btn-lg continue-btn" value="{{__('general.deleteConfirm')}}"></input>
                            </form>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">{{__('general.cancel')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete business administration Modal -->
