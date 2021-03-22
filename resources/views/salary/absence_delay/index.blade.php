@push('scripts')
<script>
    function getAbsenceDelayData(id){
        $.ajax({
url:`absence_delay_penalty/${id}`,
dataType:'json',
type:'get',
success:function(data){
    console.log(data.data)
    if(data.data.id === id){
    $(`#employee_id_${id}`).val(data.data.employee_id)
    $(`#month_${id}`).val(data.data.month)
    $(`#absence_subtract_${id}`).val(data.data.absence_subtract)
    $(`#delay_subtract_${id}`).val(data.data.delay_subtract)
    }
},
error(response){
  
}
});
    }
  
  function handleAbsenceDelaySubmit(id){
    var employee_id =  $(`#employee_id_${id}`).val()
    var month = $(`#month_${id}`).val()
    var absence_subtract = $(`#absence_subtract_${id}`).val()
    var delay_subtract = $(`#delay_subtract_${id}`).val()
   

            $.ajax({
url:`absence_delay_penalty/${id}`,
dataType:'json',
type:'PUT',
data:{_token : '{{csrf_token()}}' , employee_id , month  , absence_subtract,delay_subtract },
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
                        <h3 class="page-title">{{trans('nav.absence_delay_penalties')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.absence_delay_penalties')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_absence_delay_penalties"><i class="fa fa-plus"></i>
                            {{__('time_management.add')}}</a>
                            <a href="#" class="btn add-btn" style="display: block ; margin-left : 10px" data-toggle="modal" data-target="#add_absence_delay_excel"><i class="fa fa-plus"></i>
                                {{__('time_management.upload_excel')}}</a>
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
@include('salary.absence_delay.add')
@include('salary.absence_delay.add_excel')
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}

    
@endpush
