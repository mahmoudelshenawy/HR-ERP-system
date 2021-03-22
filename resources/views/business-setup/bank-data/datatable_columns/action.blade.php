<a class=" btn-sm btn-outline-info"href="#" data-toggle="modal"  data-target="#edit_bank{{$id}}"><i class="fa fa-edit " ></i> </a>
<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_bank{{$id}}"><i class="fa fa-trash " ></i> </a>

@include('business-setup.bank-data.edit')
@include('business-setup.bank-data.delete')
