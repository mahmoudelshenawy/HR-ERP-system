<table class="table table-striped custom-table datatable">
    <thead>
    <tr>
        <th>{{trans('employee.employee_name')}}</th>
        <th>{{trans('general.day')}}</th>
        <th>{{trans('employee.check_in')}}</th>
        <th>{{trans('employee.check_out')}}</th>
    </tr>
    </thead>
    <tbody>
      @if(count($rules) >0 )
        @foreach($rules as $rule)
            <tr>
                <td>
                    <h2 class="table-avatar">
                        <a href="{{url('employees/'.DB::table('employee_general_data')->where('id',$rule->employee_id)->value('id'))}}" class="avatar">
                            <img style="max-height: 100%" src="{{ asset('uploads/files/employees/code/'.DB::table('employee_general_data')->where('id',$rule->employee_id)->value('code').'/'.DB::table('employee_general_data')->where('id',$rule->employee_id)->value('employee_img'))}}"></a>
                        <a href="{{url('employees/'.DB::table('employee_general_data')->where('id',$rule->employee_id)->value('id'))}}">  {{DB::table('employee_general_data')->where('id',$rule->employee_id)->value('employee_name')}}<span style="color: #ff9b44"></span>
                            <span style="color: #721c24">{{( DB::table('employee_general_data')->where('id',$rule->employee_id)->value('phone_1')? DB::table('employee_general_data')->where('id',$rule->employee_id)->value('phone_1'):'')}}</span>
                        </a>
                    </h2>
                </td>
                <td>{{$rule->day}}</td>
                <td class="text-success">{{$rule->check_in?$rule->check_in : trans('time_management.holiday')}}</td>
                <td class="text-danger">{{$rule->check_out?$rule->check_out : trans('time_management.holiday')}}</td>
            </tr>
        @endforeach
      @else
    {{trans('general.no_data')}}
      @endif
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {!! $rules->links() !!}
</div>
