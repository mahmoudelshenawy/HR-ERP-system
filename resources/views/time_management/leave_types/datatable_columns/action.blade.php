<a class=" btn-sm btn-outline-info"href="#" data-toggle="modal"  data-target="#edit_leave_type{{$id}}"><i class="fa fa-edit " ></i> </a>
<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_leave_type{{$id}}}"><i class="fa fa-trash " ></i> </a>

@include('time_management.leave_types.edit')
@include('time_management.leave_types.delete')
