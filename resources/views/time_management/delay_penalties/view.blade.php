<!-- Delete delete_delay_penalty Modal -->
<div class="modal custom-modal fade" id="view_delay_penalty{{$id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>{{__('time_management.penalty')}}</h3>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <label class="col-form-label">{{__('employee.branch')}}</label>
                            <div class="form-group">
                                <h2 class="table-avatar">
                                    <a href="{{url('business-setup/business-branch/'.$branch_id)}}" class="avatar">
                                        @if(DB::table('business_branches')->where('id',$branch_id )->value('logo') )
                                            <img alt="" src="{{asset('uploads/files/branches'.DB::table('business_branches')->where('id',$branch_id )->value('name').'/images/'.DB::table('business_branches')->where('id',$branch_id )->value('logo') )}}">@else
                                            <img alt="" src="{{asset('img/ArSoftware..gif')}}">
                                        @endif
                                    </a>
                                    <a href="{{url('business-setup/business-branch/'.$branch_id)}}">  {{DB::table('business_branches')->where('id',$branch_id )->value('name') }}
                                    </a>
                                </h2>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text">
                                <label class="col-form-label">{{__('time_management.delay_count')}}</label><br>
                                <label class="col-form-label">{{$count}}</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.delay_minutes')}}</label><br>
                                <label  class="col-form-label">{{$delay_minutes}}</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.delay_deduct')}}</label><br>
                                <label  class="col-form-label">{{$penalty}}</label>
                            </div>
                        </div>

                        <div class="col-6"  id="max_penalty{{$id}}">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.max_penalty_option')}}</label><br>
                                @if($max_penalty == 0)
                                    <label  class="col-form-label">{{trans('time_management.inactive_employee')}}</label>
                                @else
                                    <label  class="col-form-label">{{trans('time_management.max_delay_penalty_applicant')}}<span>{{$max_penalty}}</span></label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete business branch Modal -->
