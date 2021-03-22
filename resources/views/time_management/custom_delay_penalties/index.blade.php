@push('scripts')
<script>
    function getCustomDelayData(id){
        $.ajax({
url:`custom-delay-penalties/${id}`,
dataType:'json',
type:'get',
success:function(data){
    console.log(data.data)
    if(data.data.id === id){
    $(`#custom_select_${id}`).val(data.data.administration_id)
    $(`#custom_minute_${id}`).val(data.data.minute_deduction)
    }
},
error(response){
  
}
});
    }
  
  function handleCustomDelaySubmit(id){
    var administration_id =  $(`#custom_select_${id}`).val()
    var minute_deduction = $(`#custom_minute_${id}`).val()
            $.ajax({
url:`custom-delay-penalties/${id}`,
dataType:'json',
type:'PUT',
data:{_token : '{{csrf_token()}}' , administration_id , minute_deduction},
beforeSend: function(){
    $('#custom_select').val("")
     $('#custom_minute').val("")
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
                        <h3 class="page-title">{{trans('nav.custom_delay_penalties')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.custom_delay_penalties')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_custom_delay_penalty"><i class="fa fa-plus"></i>
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
@include('time_management.custom_delay_penalties.add')
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}

    
@endpush
