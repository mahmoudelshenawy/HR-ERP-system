<a class=" btn-sm btn-outline-info"href="#" data-toggle="modal"  data-target="#edit_contract_type{{$id}}"><i class="fa fa-edit " ></i> </a>
<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_contract_type{{$id}}"><i class="fa fa-trash " ></i> </a>

@include('business-setup.contract-type.edit')
@include('business-setup.contract-type.delete')
