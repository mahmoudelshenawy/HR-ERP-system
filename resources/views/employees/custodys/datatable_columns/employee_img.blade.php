<h2 class="table-avatar">
    <a href="{{url('employees/'. DB::table('employee_general_data')->where('id',$employee_id)->value('id'))}}" class="avatar" data-toggle="tooltip" title="" data-original-title="{{$employee_id}}">
        <img alt="" style="max-height: 100%" src="{{asset('uploads/files/employees/code/'.DB::table('employee_general_data')->where('id',$employee_id)->value('code').'/'.DB::table('employee_general_data')->where('id',$employee_id)->value('employee_img') ) }}">
    </a>

    <a href="{{url('employees/'. DB::table('employee_general_data')->where('id',$employee_id)->value('id'))}}">
        <span class="text-danger"> {{DB::table('employee_general_data')->where('id',$employee_id)->value('employee_name')}}</span>
    </a>
</h2>
