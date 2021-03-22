@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">{{trans('report.employee_financial_data')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('report.employee_financial_data')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" id="code">
                        <label class="focus-label">{{__('employee.code')}}</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" id="name">
                        <label class="focus-label">{{__('employee.name')}}</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3" data-select2-id="23">
                    <div class="form-group form-focus select-focus focused">
                        <select class="select" id="job">
                            <option value="0">{{__('employee.job')}}</option>
                            @foreach(App\BusinessJob::all() as $job)
                                <option value="{{$job->id}}">{{$job->name}}</option>
                            @endforeach
                        </select>
                        <label class="focus-label text-muted small">{{__('employee.job')}}</label>

                    </div>
                </div>

                <div class="col-sm-6 col-md-3" data-select2-id="23">
                    <div class="form-group form-focus select-focus focused">
                        <select class="select" name="branch" id="branch">
                            <option value="0">{{__('general.all_branches')}}</option>
                            @foreach(App\BusinessBranch::all() as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                        </select>
                        <label class="focus-label text-muted small">{{__('employee.branch')}}</label>

                    </div>
                </div>

            </div>

            <div class="card-body card">
                <div class="col-md-12 ">
                    <div class="table-responsive ">
                        {!!  $dataTable->table(['class'=>' dataTable table-radius table-nowrap table'],true) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('salary.advance.add')
    @include('salary.advance.add_excel')
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
<script>
    const table =  $('#reportemployeefinanacialdata-table');
    table.on('preXhr.dt',function (e,setting,data) {
    data.branch = $('#branch').val();
    data.job = $('#job').val()
    data.code = $('#code').val()
    data.name = $('#name').val()
    });
    $('#branch').on('change',function () {
    table.DataTable().ajax.reload();
    return false;
    }) ;
    $('#job').on('change',function () {
    table.DataTable().ajax.reload();
    return false;
    });
    $('#code').on('keyup',function () {
    table.DataTable().ajax.reload();
    return false;
    }) ;
    $('#name').on('keyup',function () {
    table.DataTable().ajax.reload();
    return false;
    })

</script>
@endpush
