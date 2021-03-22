<div class="dropdown">
    <a style="min-width: 120px" href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle border-secondary" data-toggle="dropdown" aria-expanded="false">@if($country_id) {{DB::table('countries')->where('id','=',$country_id)->value('name')}}
        <img src="https://www.countryflags.io/{{DB::table('countries')->where('id',$country_id)->value('img')}}/shiny/16.png">@endif
    </a>
    <div class="dropdown-menu border-success">
        <a class="dropdown-item" href="#"> <span><i class="fa fa-dot-circle-o text-danger"></i>@if($national_id_number)  {{trans('employee.national_id')}}</span>  {{ $national_id_number}} @endif</a>
        <a class="dropdown-item" href="#"><span><i class="fa fa-dot-circle-o text-warning"></i>@if($residency_number) {{trans('employee.residence_number')}}</span>  {{ $residency_number}} @endif</a>
        <a class="dropdown-item" href="#"><span><i class="fa fa-dot-circle-o text-info"></i>@if($passport_number) {{trans('employee.passport_number')}}</span>  {{ $residency_number}} @endif</a>
    </div>
</div>
