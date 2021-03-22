<!-- Edit Holiday Modal -->
<div class="modal custom-modal fade" id="edit_holiday{{$id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.edit_holiday')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_holiday" action="{{ url('time-management/holidays/'.$id) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="form-group">
                        <label>{{__('time_management.holiday_name')}} <span class="text-danger">*</span></label>
                        <input class="form-control" value="{{$name}}" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label>{{__('time_management.holiday_date')}} <span class="text-danger">*</span></label>
                        <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="date" id="date" value="{{$date}}"></div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">{{__('general.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Holiday Modal -->
<script>
    $('.datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: 'en'
    });
</script>
