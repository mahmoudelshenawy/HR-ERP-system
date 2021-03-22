<td class="text-center align-content-center">
    <a class=" btn-sm btn-outline-info" href="{{url('business-setup/business-branch/'.$id)}}"><i class="fa fa-eye" ></i> </a>
    <a class=" btn-sm btn-outline-danger"
    href="#" data-toggle="modal" data-target="#delete_business_branch{{$id}}"><i class="fa fa-trash-o" ></i> </a>
</td>
@include('business-setup.business-branch.delete')
