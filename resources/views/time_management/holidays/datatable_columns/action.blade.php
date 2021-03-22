<a class=" btn-sm btn-outline-info"href="#" data-toggle="modal"  data-target="#edit_holiday{{$id}}"><i class="fa fa-edit " ></i> </a>
<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_holiday{{$id}}}"><i class="fa fa-trash " ></i> </a>

@include('time_management.holidays.edit')
@include('time_management.holidays.delete')
