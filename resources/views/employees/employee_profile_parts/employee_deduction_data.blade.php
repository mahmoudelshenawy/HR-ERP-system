<div class="tab-pane fade" id="employee_deduction">
    <div class="card profile-box flex-fill col-10">
        <div class="card-body col-12" >
            <h3 class="card-title">{{trans('employee.employee_deduction_data')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#add_deduction"><i class="fa fa-pencil"></i></a></h3>
            <ul class="personal-info">
                @forelse ($employee_deductions as $deduction)
                <li>
                    <div class="title" style="display: inline-block">{{$deduction->fixed_deduction->name}}</div>
                        <div class="text" style="display: inline-block">
                            {{$deduction->deduction_amount}}
                        </div>
                        <div class="text" style="float : left; margin-left:40%">
                            <a class=" btn-sm btn-outline-primary"href="#"  onclick="handleDeductionData({{$deduction->id}})"  data-toggle="modal"  data-target="#edit_deduction_{{$deduction->id}}"><i class="fa fa-edit" ></i> </a>

                        <a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_deduction_{{$deduction->id}}"><i class="fa fa-trash" ></i> </a>
                        </div>
                         {{-- form of edit --}}
                @include('employees.employee_profile_edit_parts.edit_deduction' )
                {{-- end of form of edit --}}
                 {{-- form of delete --}}
                 @include('employees.employee_profile_edit_parts.delete_deduction' ,['id' => $deduction->id])
                 {{-- end of form of delete --}}
                    </li>
                @empty
                    <div class="d-flex justify-content-center align-items-center">
                         <h2>عفوا لم يتم اضافه الإستقطاعات الماليه بعد</h2>
                    </div>
                @endforelse
            </ul>
        </div>
    </div>



</div>
