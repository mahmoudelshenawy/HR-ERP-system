{{-- <a class=" btn-sm btn-outline-info" href="#" data-toggle="modal" data-target="#view_delay_penalty{{$id}}"><i class="fa fa-id-card " ></i> </a> --}}
<a class=" btn-sm btn-outline-primary" href="#" data-toggle="modal" data-target="#edit_delay_penalty_{{$id}}" onclick="handleDelayPenaltyData({{$id}})"><i class="fa fa-pencil " ></i> </a>
<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_delay_penalty{{$id}}"><i class="fa fa-trash " ></i> </a>


@include('time_management.delay_penalties.delete')
{{-- @include('time_management.delay_penalties.view') --}}


<div id="edit_delay_penalty_{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.delay_penalties')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="delay_penalty_form" onsubmit="handleDelayPenaltySubmit({{$id}})">
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.delay_minutes')}}<span class="text-danger">*</span></label>
                            <input type="number" name="delay_minutes" class="form-control" id="delay_minutes_{{$id}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.penalty_first_time')}}<span class="text-danger">*</span></label>
                            <input type="text" name="penalty_first_time" class="form-control" id="penalty_first_time_{{$id}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.penalty_second_time')}}<span class="text-danger">*</span></label>
                                <input type="text" name="penalty_second_time" class="form-control" id="penalty_second_time_{{$id}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.penalty_third_time')}}<span class="text-danger">*</span></label>
                                <input type="text" name="penalty_third_time" class="form-control" id="penalty_third_time_{{$id}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.penalty_fourth_time')}}<span class="text-danger">*</span></label>
                                <input type="text" name="penalty_fourth_time" class="form-control" id="penalty_fourth_time_{{$id}}">
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
