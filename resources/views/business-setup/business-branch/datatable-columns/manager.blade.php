<h2 class="table-avatar">
    @if($manager_id)
        <a href="{{url('employees/'. DB::table('employee_general_data')->where('id',$manager_id)->value('id'))}}" class="avatar" data-toggle="tooltip" title="" data-original-title="{{$manager_id}}">
            <img alt="" style="max-height: 100%" src="{{asset('uploads/files/employees/code/'.DB::table('employee_general_data')->where('id',$manager_id)->value('code').'/'.DB::table('employee_general_data')->where('id',$manager_id)->value('employee_img') ) }}">
        </a>
    @endif
    <a href="{{url('employees/'. DB::table('employee_general_data')->where('id',$manager_id)->value('id'))}}">
        <span class="text-danger"> {{DB::table('employee_general_data')->where('id',$manager_id)->value('employee_name')}}</span>
    </a>
</h2>


