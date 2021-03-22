<td>
    <h2 class="table-avatar">
       @if($employee_id) <a href="{{url('employees/'.$employee_id)}}" class="avatar"><img alt="" src="{{(DB::table('employee_general_data')->where('id',$employee_id)->value('employee_img') ? asset('uploads/files/employees/code/'.DB::table('employee_general_data')->where('id',$employee_id)->value('code') .'/'.DB::table('employee_general_data')->where('id',$employee_id)->value('employee_img') ) : '') }}" style="max-height: 100%"></a>
        @endif
        <a class="text-sm" href="{{url('employees/'.$employee_id)}}">{{DB::table('employee_general_data')->where('id',$employee_id)->value('employee_name') }}
        </a>
    </h2>
</td>
