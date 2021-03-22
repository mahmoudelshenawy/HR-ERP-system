<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_grace_period{{$id}}"><i class="fa fa-trash " ></i> </a>

<a class=" btn-sm btn-outline-info edit_custom_delay_btn" href="#" id="edit_custom_delay_btn" data-toggle="modal" onclick="getGracePeriodData({{$id}})" data-target="#edit_grace_period_{{$id}}"><i class="fa fa-pencil " ></i> </a>


@include('time_management.grace_period.delete')

<div id="edit_grace_period_{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.grace_period')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form class="custom_delay_form" onsubmit="handleGracePeriodSubmit({{$id}})">
                <div class="modal-body">
                    {{-- @csrf()
                    @method('PUT') --}}
                    <div class="row">
                       
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.minutes')}}<span class="text-danger">*</span></label>
                            <input type="number" name="minutes" class="form-control" id="minutes_{{$id}}">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
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
    $('.datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: 'en'
    });
</script>
