<div class="dropdown action-label">
    @if($statue == 'approved')
        <a href="" class="btn btn-white btn-sm btn-rounded " data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> {{trans('employee.resignation_approved')}} </a>
    @elseif($statue == 'waiting')
        <a href="" class="btn btn-white btn-sm btn-rounded " data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-warning"></i> {{trans('employee.resignation_waiting')}} </a>
    @else
        <a href="" class="btn btn-white btn-sm btn-rounded" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> {{trans('employee.resignation_not_approved')}} </a>
    @endif
</div>
