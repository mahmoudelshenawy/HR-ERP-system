<a class=" btn-sm btn-outline-info"href="#" data-toggle="modal"  data-target="#edit_loan{{$id}}"><i class="fa fa-edit " ></i> </a>
<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_loan{{$id}}"><i class="fa fa-trash " ></i> </a>

@include('employees.loans.edit')
@include('employees.loans.delete')
