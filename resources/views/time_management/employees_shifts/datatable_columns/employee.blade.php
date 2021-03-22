<h2 class="table-avatar">
    <a href="{{url('employees/'.DB::table('employee_general_data')->where('id',$employee_id)->value('id'))}}" class="avatar">
        <img style="max-height: 100%" src="{{ asset('uploads/files/employees/code/'.DB::table('employee_general_data')->where('id',$employee_id)->value('code').'/'.DB::table('employee_general_data')->where('id',$employee_id)->value('employee_img'))}}"></a>
    <a href="{{url('employees/'.DB::table('employee_general_data')->where('id',$employee_id)->value('id'))}}">  {{DB::table('employee_general_data')->where('id',$employee_id)->value('employee_name')}}<span style="color: #ff9b44"></span>
        <span style="color: #721c24">{{( DB::table('employee_general_data')->where('id',$employee_id)->value('phone_1')? DB::table('employee_general_data')->where('id',$employee_id)->value('phone_1'):'')}}</span>
    </a>
</h2>
