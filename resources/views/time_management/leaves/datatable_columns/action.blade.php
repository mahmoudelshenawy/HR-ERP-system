<a class=" btn-sm btn-outline-primary"href="#" data-toggle="modal"  data-target="#edit_leave{{$id}}" onclick="handleLeavesData({{$id}})"><i class="fa fa-edit" ></i> </a>

<a class=" btn-sm btn-outline-info" href="#" data-toggle="modal" data-target="#view_leaves{{$id}}"><i class="fa fa-id-card " ></i> </a>

<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_employee_leaves{{$id}}"><i class="fa fa-trash " ></i> </a>

@include('time_management.leaves.delete')
@include('time_management.leaves.edit')


