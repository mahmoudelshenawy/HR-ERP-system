@if(count($employeeData) > 0)
    @foreach($employeeData as $employee)
        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
            <div class="profile-widget">
                <div class="profile-img">
                    <a href="{{url('employees/'.$employee->id)}}" class="avatar"> <img src="@if($employee->employee_img)
                        {{asset('uploads/files/employees/code/'.$employee->code.'/'.$employee->employee_img)}}@else
                        {{asset('img/user.jpg')}} @endif" style="max-height: 100%;max-width: 100%"></a>
                </div>
                <div class="dropdown profile-action">
                    <a class="  btn-rounded border-secondary" >@if($employee->country_id)
                            <img src="https://www.countryflags.io/{{DB::table('countries')->where('id',$employee->country_id)->value('img')}}/shiny/16.png">
                        @endif
                    </a>
                </div>
                <div class="small text-danger">{{$employee->code}}</div>
                <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{url('employees/'.$employee->id)}}" ><span class="text-justify">{{strtolower($employee->employee_name)}}</span></a></h4>
                <div class="small text-muted">{{DB::table('business_jobs')->where('id',$employee->job_id)->value('name')}}</div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {!! $employeeData->links() !!}
    </div>
@else
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3 offset-4" style="padding-top: 80px">
        <div class="profile-widget">
            <div class="profile-img">
                <a href="#" class="avatar" onclick="javascript:window.location.reload()"> <img src="{{asset('img/user.jpg')}}" style="max-height: 100%;max-width: 100%"></a>
            </div>
            <div class="dropdown profile-action">
            </div>
            <div class="small text-danger">{{0}}</div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a onclick="javascript:window.location.reload()" href="#" ><span class="text-justify">{{__('general.no_data')}}</span></a></h4>
        </div>
    </div>
@endif
