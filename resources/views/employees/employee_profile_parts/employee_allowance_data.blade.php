<div class="tab-pane fade" id="employee_allowance">

    <div class="card profile-box flex-fill col-10">
        <div class="card-body col-12" >
            <h3 class="card-title">{{trans('employee.employee_allowance_data')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#add_allowance"><i class="fa fa-pencil"></i></a></h3>
            <ul class="personal-info">
            @forelse ($employee_allowances as $index=>$allowance)
            <li>
                {{--  --}}
            <div class="title" style="display: inline-block">{{$allowance->fixed_allowance->name}}</div>
                <div class="text" style="display: inline-block">
                    {{$allowance->allowance_amount}}
                </div>
                <div class="text" style="float : left; margin-left:40%">
                <a class=" btn-sm btn-outline-primary"href="#" onclick="handleAllowanceData({{$allowance->id}})" data-toggle="modal"  data-target="#edit_allowance_{{$allowance->id}}"><i class="fa fa-edit" ></i> </a>

                <a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_allowance_{{$allowance->id}}"><i class="fa fa-trash" ></i> </a>
                </div>
                {{-- form of edit --}}
                @include('employees.employee_profile_edit_parts.edit_allowance' )
                {{-- end of form of edit --}}
                {{-- form of delete --}}
                @include('employees.employee_profile_edit_parts.delete_allowance' ,['id' => $allowance->id])
                {{-- end of form of delete --}}
            </li>
            @empty
                <div class="d-flex justify-content-center align-items-center">
                     <h2>عفوا لم يتم اضافه العلاوات الماليه بعد</h2>
                </div>
            @endforelse
            </ul>
        </div>
    </div>
</div>
