
    @if($statue == 0)
        <span class="btn-danger">{{__('employee.inactive')}}</span>
    @else
        <span class="btn-success">{{__('employee.active')}}</span>
    @endif
</span>
