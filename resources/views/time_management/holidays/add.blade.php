<div class="modal custom-modal fade" id="add_holiday" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> {{__('time_management.add_holiday')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('time-management/holidays') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label> {{__('time_management.holiday_name')}} <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label>{{__('time_management.holiday_date')}}<span class="text-danger">*</span></label>
                        <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="date"></div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">{{__('general.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
