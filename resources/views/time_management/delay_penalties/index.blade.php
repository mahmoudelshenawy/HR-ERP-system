
@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">{{trans('nav.delay_penalties')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.delay_penalties')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_delay_penalty"><i class="fa fa-plus"></i>
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
@include('time_management.delay_penalties.add')


@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}

    <script>
        function handleDelayPenaltyData(id){
  
          $.ajax({
    url:`delay-penalties/${id}`,
    dataType:'json',
    type:'get',
    success:function(data){
      console.log(data)
      if(data.data.id === id){
      $(`#delay_minutes_${id}`).val(data.data.delay_minutes)
      $(`#penalty_first_time_${id}`).val(data.data.penalty_first_time)
      $(`#penalty_second_time_${id}`).val(data.data.penalty_second_time)
      $(`#penalty_third_time_${id}`).val(data.data.penalty_third_time)
      $(`#penalty_fourth_time_${id}`).val(data.data.penalty_fourth_time)
      }
  },
  error(response){
    console.log(response)
  }
  });
          }
  function handleDelayPenaltySubmit(id){
  var delay_minutes = $(`#delay_minutes_${id}`).val();
  var penalty_first_time = $(`#penalty_first_time_${id}`).val();
  var penalty_second_time = $(`#penalty_second_time_${id}`).val();
  var penalty_third_time = $(`#penalty_third_time_${id}`).val();
  var penalty_fourth_time = $(`#penalty_fourth_time_${id}`).val();

  $.ajax({
url:`delay-penalties/${id}`,
dataType:'json',
type:'PUT',
data:{_token : '{{csrf_token()}}' , delay_minutes , penalty_first_time , penalty_second_time , penalty_third_time , penalty_fourth_time },
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
