<?php 
$employee_img = \DB::table('employee_general_data')->where('id' , $employee_id)->value('employee_img');
$code = \DB::table('employee_general_data')->where('id' , $employee_id)->value('code');
$name = \DB::table('employee_general_data')->where('id' , $employee_id)->value('employee_name');
?>

 <h2 class="table-avatar">
    <a href="{{url('employees/'.$employee_id)}}" class="avatar"><img alt="" src="{{($employee_img ? asset('uploads/files/employees/code/'.$code.'/'.$employee_img) : '') }}" style="max-height: 100%"></a>
    <a href="{{url('employees/'.$employee_id)}}">  {{$name}}
    </a>
</h2> 
