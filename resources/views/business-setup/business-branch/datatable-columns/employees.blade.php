<ul class="team-members text-nowrap">
    @foreach(App\EmployeeGeneralData::where('branch_id',$id)->take(3)->get() as $employee)
        <li>
            <a href="#" title="{{$employee->employee_name}}" data-toggle="tooltip"><img alt="" src="{{($employee->employee_img ? asset('uploads/files/employees/code/'.$employee->code.'/'.$employee->employee_img): asset('img/user.jpg')) }}"></a>
        </li>
    @endforeach
    <li class="dropdown avatar-dropdown">
        @if((App\EmployeeGeneralData::where('branch_id',$id)->count() - 3) > 0 )
            <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                {{'+'.(App\EmployeeGeneralData::where('branch_id',$id)->count() - 3) }}
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="avatar-group">
                        @foreach(App\EmployeeGeneralData::where('branch_id',$id)->skip(3)->take(9)->get() as $employee)
                            <a class="avatar avatar-xs" href="#">
                                <img alt="" src="{{($employee->employee_img ? asset('uploads/files/employees/code/'.$employee->code.'/'.$employee->employee_img): asset('img/user.jpg')) }}">
                            </a>
                        @endforeach
                    </div>
                    <div class="avatar-pagination">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="{{url('business-setup/business-branch/'.$id)}}" >
                                    <span aria-hidden="true">{{__('general.more')}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
        @else
        @endif
    </li>
</ul>
