<a  href="#" data-toggle="modal"  data-target="#edit_guarantor{{$id}}"><i class="fa fa-pencil m-r-5 text-info"></i> </a>
<a  href="#" data-toggle="modal" data-target="#delete_guarantor{{$id}}"><i class="fa fa-trash-o m-r-5 text-danger"></i> </a>


@include('business-setup.guarantor.edit')
@include('business-setup.guarantor.delete')
