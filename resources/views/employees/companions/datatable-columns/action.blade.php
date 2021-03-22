<a class=" btn-sm btn-outline-info"href="#" data-toggle="modal"  data-target="#edit_companion{{$id}}"><i class="fa fa-edit " ></i> </a>
<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_companion{{$id}}"><i class="fa fa-trash " ></i> </a>

@include('employees.companions.edit')
@include('employees.companions.delete')
