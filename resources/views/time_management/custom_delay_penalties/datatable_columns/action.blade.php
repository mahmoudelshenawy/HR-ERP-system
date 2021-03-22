<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_custom_delay_penalty{{$id}}"><i class="fa fa-trash " ></i> </a>

<a class=" btn-sm btn-outline-info edit_custom_delay_btn" href="#" id="edit_custom_delay_btn" data-toggle="modal" onclick="getCustomDelayData({{$id}})" data-target="#edit_custom_delay_penalty_{{$id}}" data-id={{$id}}><i class="fa fa-pencil " ></i> </a>


@include('time_management.custom_delay_penalties.delete')

<div id="edit_custom_delay_penalty_{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.custom_delay_penalties')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form class="custom_delay_form" onsubmit="handleCustomDelaySubmit({{$id}})">
                <div class="modal-body">
                    {{-- @csrf()
                    @method('PUT') --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.administration')}}<span class="text-danger">*</span></label>
                            <select class="form-control" name="administration_id" id="custom_select_{{$id}}">
                                    @foreach(App\BusinessAdministration::all() as $administr)
                                        <option value="{{$administr->id}}">{{$administr->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.minute_deduction')}}<span class="text-danger">*</span></label>
                            <input type="number" name="minute_deduction" class="form-control" id="custom_minute_{{$id}}">
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
