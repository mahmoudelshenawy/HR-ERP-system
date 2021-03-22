<!-- Edit movement Modal -->
<div id="edit_movement{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.edit_movement')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form onsubmit="handleMovementsSubmit({{$id}})">
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label" style="display: block">{{__('employee.select_employee')}}<span class="text-danger">*</span></label>
                            <select class="js-example-matcher-start" name="employee_id" id="employee_id_{{$id}}">   
                                @foreach(DB::table('employee_general_data')->where('statue','active')->get() as $employee)
                                    <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label" style="display: block">{{__('employee.new_branch')}}<span class="text-danger">*</span></label>
                            <select class="js-example-matcher-start" name="new_branch"  id="new_branch_{{$id}}">
                                @foreach (App\BusinessBranch::all(['name' , 'id']) as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label" style="display: block">{{__('employee.job')}}<span class="text-danger">*</span></label>
                            <select class="js-example-matcher-start" name="new_job"  id="new_job_{{$id}}">
                                @foreach (App\BusinessJob::all(['name','id']) as $job)
                            <option value="{{$job->id}}">{{$job->name}}</option>
                                @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="focus-label" style="display: block">{{trans('employee.movement_date')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                <input type="text" name="movement_date"  class="form-control floating datetimepicker" id="movement_date_{{$id}}">
                                </div>
                                <label class="focus-label">{{trans('employee.movement_date')}}</label>
                            </div>
                        </div><br>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>