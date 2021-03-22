@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">{{trans('nav.employee_leaves')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.employee_leaves')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i>
                            {{__('time_management.add')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card-body card">
                <div class="col-md-12 ">
                    <div class="table-responsive ">
                        {!! $dataTable->table(['class'=>' dataTable table-radius table-nowrap '],true) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('time_management.leaves.add')
   
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
<script>
  function handleLeavesData(id){
        $.ajax({
url:`employee-leaves/${id}`,
dataType:'json',
type:'get',
success:function(data){
    console.log(data.data)
    if(data.data.id === id){
    $(`#employee_id_${id}`).val(data.data.employee_id)
    $(`#leave_type_id_${id}`).val(data.data.leave_type_id)
    $(`#start_day_${id}`).val(data.data.start_day)
    $(`#end_day_${id}`).val(data.data.end_day)
    $(`#cause_${id}`).val(data.data.cause)
    }
},
error(response){
  console.log(response)
}
});
    };

    function handleLeavesSubmit(id){
    var employee_id  = $(`#employee_id_${id}`).val()
   var leave_type_id  = $(`#leave_type_id_${id}`).val()
   var start_day = $(`#start_day_${id}`).val()
    var end_day = $(`#end_day_${id}`).val()
    var cause = $(`#cause_${id}`).val()

    $.ajax({
    url:`employee-leaves/${id}`,
dataType:'json',
type:'PUT',
data:{_token : '{{csrf_token()}}' , employee_id , leave_type_id , start_day , end_day , cause},
success:function(data){
},
error(response){

}
});
    }
</script>
@endpush
