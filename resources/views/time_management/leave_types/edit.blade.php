<div id="edit_leave_type{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.edit_leave_type')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{url('time-management/leave-types/'.$id)}}" >
                @csrf()
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label class="col-form-label">{{__('time_management.leave_name')}} <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{$name}}">
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">{{__('time_management.type_cat')}}<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="js-example-matcher-start" name="type_cat">
                                    @foreach(config('enums.type_cat') as $type)
                                        <option value="{{$type}}" {{$type_cat == $type ? 'selected':''}}>{{(__('time_management.'.$type))}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">{{__('time_management.deduct_type')}}<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="js-example-matcher-start" name="deduct_type">
                                    <option value="daily" {{$deduct_type == 'daily'? 'selected':''}}>{{(__('time_management.daily'))}}</option>
                                    <option value="fixed_amount" {{$deduct_type == 'fixed_amount'? 'selected':''}}>{{(__('time_management.fixed_amount'))}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">{{__('time_management.amount')}} <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="amount" value="{{$amount}}">
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
<script>
    $(".js-example-matcher-start").select2({
        width: '100%',
        minHeight:'100%',
        lineHeight:'44px',
    });
</script>
