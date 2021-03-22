<div id="edit_shift{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.add_shift')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{url('time-management/shifts/'.$id)}}" >
                <div class="modal-body">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf()
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.shift_name')}}<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{$name}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.check_in')}}<span class="text-danger">*</span></label>
                                <input type="time" name="check_in" class="form-control" value="{{$check_in}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.check_out')}}<span class="text-danger">*</span></label>
                                <input type="time" name="check_out" class="form-control" value="{{$check_out}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">{{__('time_management.week_holiday')}}<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="js-example-matcher-start" name="holiday">
                                    @foreach(['none','saturday','sunday','monday','tuesday','wednesday','thursday','friday'] as $day)
                                        <option  value="{{$day}}" {{$holiday == $day ? 'selected':''}}> {{__('time_management.'.$day)}}</option>
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




