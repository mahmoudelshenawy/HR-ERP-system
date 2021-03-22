<a class=" btn-sm btn-outline-info"href="#" data-toggle="modal"  data-target="#edit_medical_insurance{{$id}}"><i class="fa fa-edit " ></i> </a>
<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_medical_insurance{{$id}}"><i class="fa fa-trash " ></i> </a>

@include('business-setup.medical-insurance.edit')
@include('business-setup.medical-insurance.delete')
