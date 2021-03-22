@push('scripts')
<script>
    function getAttendencePermissionsData(id){
        $.ajax({
url:`attendence_permissions/${id}`,
dataType:'json',
type:'get',
success:function(data){
    console.log(data.data)
    if(data.data.id === id){
    $(`#employee_id_${id}`).val(data.data.employee_id)
    $(`#day_${id}`).val(data.data.day)
    $(`#from_${id}`).val(data.data.from)
    $(`#to_${id}`).val(data.data.to)
    $(`#type_${id}`).val(data.data.type)
    }
},
error(response){
  
}
});
    }
  
  function handleAttendencePermissionsSubmit(id){
    var employee_id =  $(`#employee_id_${id}`).val()
    var day = $(`#day_${id}`).val()
    var from = $(`#from_${id}`).val()
    var to = $(`#to_${id}`).val()
    var type = $(`#type_${id}`).val()

            $.ajax({
url:`attendence_permissions/${id}`,
dataType:'json',
type:'PUT',
data:{_token : '{{csrf_token()}}' , employee_id , day , from  , to , type},
beforeSend: function(){
    
},
success:function(data){
   
    // location.reload(true);
},
error(response){
console.log(response)
}
});
  } 
</script>
@endpush
@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">{{trans('nav.attendence_permissions')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.attendence_permissions')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_attendence_permissions"><i class="fa fa-plus"></i>
                            {{__('time_management.add')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card-body card">
                <div class="col-md-12 ">
                    <div class="table-responsive ">
                        {!!  $dataTable->table(['class'=>' dataTable table-radius table-nowrap table'],true) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@include('time_management.attendence_permissions.add')
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}

    
@endpush
