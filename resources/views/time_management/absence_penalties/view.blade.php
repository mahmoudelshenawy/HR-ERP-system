<!--  view_absence_penalty Modal -->
<div class="modal custom-modal fade" id="view_absence_penalty{{$id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>{{__('time_management.penalty')}}</h3>
                </div>
                    <div class="modal-body">
                        <div class="col-6">
                            <div class="title">{{__('employee.branch')}}</div>
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
                        <hr>
                        <div class="col-6">
                            <div class="text">
                                <div class="title">{{__('time_management.delay_count')}}</div><br>
                                <div class="text">{{$count}}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-6">
                                <div class="title">{{__('time_management.delay_deduct')}}</div><br>
                                <div  class="text">{{$penalty}}</div>
                        </div>
                        <hr>
                        <div class="col-6">
                                <div class="title">{{__('time_management.max_penalty_option')}}</div><br>
                                @if($max_penalty == 0)
                                    <div  class="text">{{trans('time_management.inactive_employee')}}</div>
                                @else
                                    <div  class="text">{{trans('time_management.max_delay_penalty_applicant')}}</div><br>
                                <span>{{$max_penalty}}</span>
                                @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete business branch Modal -->
