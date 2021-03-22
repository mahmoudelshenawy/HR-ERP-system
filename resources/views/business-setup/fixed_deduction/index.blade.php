@push('scripts')
<script>
    function getFixedDeductionData(id){
        $.ajax({
url:`fixed_deduction/${id}`,
dataType:'json',
type:'get',
success:function(data){
    if(data.data.id === id){
    $(`#name_${id}`).val(data.data.name)
    }
},
error(response){
  
}
});
    }
  
  function handleFixedDeductionSubmit(id){
    var name =  $(`#name_${id}`).val()
            $.ajax({
url:`fixed_deduction/${id}`,
dataType:'json',
type:'PUT',
data:{_token : '{{csrf_token()}}' , name},
beforeSend: function(){
   
},
success:function(data){
   
    location.reload(true);
},
error(response){

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
                        <h3 class="page-title">{{trans('nav.fixed_deduction')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.fixed_deduction')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_fixed_deduction"><i class="fa fa-plus"></i>
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
@include('business-setup.fixed_deduction.add')
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
