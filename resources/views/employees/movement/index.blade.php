@extends('layouts.app')

@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

        <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{__('nav.movement')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.movement')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_movement"><i class="fa fa-plus"></i>
                            {{__('employee.add_movement')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="card-body card">
                <div class="col-md-12 ">
                    <div class="table-responsive ">
                        {!!  $dataTable->table(['class'=>' dataTable table-radius table-nowrap table'],true) !!}
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->
@include('employees.movement.add')
    </div>
    <!-- /Page Wrapper -->
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}

    <script>
        function handleMovementData(id){
            $.ajax({
url:`movement/${id}`,
dataType:'json',
type:'get',
success:function(data){
    console.log(data.data)
    if(data.data.id === id){
    $(`#employee_id_${id}`).val(data.data.employee_id)
    $(`#new_branch_${id}`).val(data.data.new_branch)
    $(`#new_job_${id}`).val(data.data.new_job)
    $(`#movement_date_${id}`).val(data.data.movement_date)
    }
},
error(response){
  console.log(response)
}
});
        }

        function handleMovementsSubmit(id){
   var employee_id = $(`#employee_id_${id}`).val()
    var new_branch = $(`#new_branch_${id}`).val()
    var new_job = $(`#new_job_${id}`).val()
    var movement_date = $(`#movement_date_${id}`).val()

            $.ajax({
url:`movement/${id}`,
dataType:'json',
type:'PUT',
data:{_token : '{{csrf_token()}}' , employee_id , new_branch , new_job  , movement_date},
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