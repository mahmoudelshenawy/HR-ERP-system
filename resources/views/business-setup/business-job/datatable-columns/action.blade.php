<a class=" btn-sm btn-outline-info"href="#" data-toggle="modal"  data-target="#edit_Job{{$id}}"><i class="fa fa-edit " ></i> </a>
<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_job{{$id}}"><i class="fa fa-trash " ></i> </a>

@include('business-setup.business-job.edit')
@include('business-setup.business-job.delete')
