@push('scripts')
<script>
    function getCommissionPermissionsData(id){
        $.ajax({
url:`commission_permissions/${id}`,
dataType:'json',
type:'get',
success:function(data){
    console.log(data.data)
    if(data.data.id === id){
    $(`#employee_id_${id}`).val(data.data.employee_id)
    $(`#from_${id}`).val(data.data.from)
    $(`#to_${id}`).val(data.data.to)
    }
},
error(response){
  
}
});
    }
  
  function handleCommissionPermissionsSubmit(id){
    var employee_id =  $(`#employee_id_${id}`).val()
    var from = $(`#from_${id}`).val()
    var to = $(`#to_${id}`).val()

            $.ajax({
url:`commission_permissions/${id}`,
dataType:'json',
type:'PUT',
data:{_token : '{{csrf_token()}}' , employee_id , from  , to },
beforeSend: function(){
    
},
success:function(data){
   
    location.reload(true);
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
                        <h3 class="page-title">{{trans('nav.commission_permissions')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.commission_permissions')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_commission_permissions"><i class="fa fa-plus"></i>
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
@include('time_management.commission_permissions.add')
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}

    
@endpush
