@push('scripts')
<script>
    function getGracePeriodData(id){
        $.ajax({
url:`grace_period/${id}`,
dataType:'json',
type:'get',
success:function(data){
    if(data.data.id === id){
    $(`#minutes_${id}`).val(data.data.minutes)
    }
},
error(response){
  
}
});
    }
  
  function handleGracePeriodSubmit(id){
    var minutes =  $(`#minutes_${id}`).val()
            $.ajax({
url:`grace_period/${id}`,
dataType:'json',
type:'PUT',
data:{_token : '{{csrf_token()}}' , minutes},
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
                        <h3 class="page-title">{{trans('nav.grace_period')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.grace_period')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_grace_period"><i class="fa fa-plus"></i>
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
@include('time_management.grace_period.add')
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}

    
@endpush
