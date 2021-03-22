<div id="add_shift" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.add_shift')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{url('time-management/shifts')}}" >
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.shift_name')}}<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.check_in')}}<span class="text-danger">*</span></label>
                                <input type="time" name="check_in" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.check_out')}}<span class="text-danger">*</span></label>
                                <input type="time" name="check_out" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.week_holiday')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="holiday">
                                    @foreach(['none','saturday','sunday','monday','tuesday','wednesday','thursday','friday'] as $day)
                                    <option  value="{{$day}}"> {{__('time_management.'.$day)}}</option>
                                    @endforeach
                                </select>
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




