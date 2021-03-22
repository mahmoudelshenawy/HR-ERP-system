<h2 class="table-avatar">
    <a href="{{url('employees/'.$id)}}" class="avatar"><img alt="" src="{{($employee_img ? asset('uploads/files/employees/code/'.$code.'/'.$employee_img) : '') }}" style="max-height: 100%"></a>
    <a href="{{url('employees/'.$id)}}">  {{$employee_name}}
        <span class="small" style="color: #2e0400">{{( $employee_name_en ? strtolower($employee_name_en) :'')}}</span>
        <span class="text-blue small " style="color: #a71d2a">{{( $employee_short_name ? strtolower($employee_short_name) :'')}}</span>
        <span style="color: #ff9b44">{{ DB::table('business_jobs')->where('id',$job_id)->value('name') }}  </span>
    </a>
</h2>

