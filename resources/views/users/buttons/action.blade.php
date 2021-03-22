<td class="text-center">
    <a  href='{{url("users/".$id."/edit")}}' class=" btn-sm btn-outline-info "><i class="fa fa-edit"></i> </a>
    <a class=" btn-sm btn-outline-danger"
       href="#" data-toggle="modal" data-target="#delete_user{{$id}}"><i class="fa fa-trash-o" ></i> </a>
</td>
@include('users.delete')
