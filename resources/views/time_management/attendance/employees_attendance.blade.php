@push('scripts')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
<script src="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script> --}}
<script>
    $(document).ready(function() {
        var product_table = $("#attendance_table").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        dom: "Bfrtip",
        ajax: {
            // url : "{{url('attendance/index')}}",
            url : "attendance",
        },
        columnDefs: [
            {
                targets: 3,
                orderable: false,
                searchable: false
            }
        ],
        columns: [
            { data: "id", name: "id" },
            { data: "employee_name.employee_name", name: "employee_name.employee_name" },
            { data: "day", name: "day" },
            { data: "check_in", name: "check_in" },
            { data: "check_out", name: "check_out" },
            {
                data: "actions",
                name: "actions",
                orderable: false,
                searchable: false,
                exportable: false,
                printable: false
            },
        ]
    })
      
   
});
</script>
@endpush
@extends('layouts.app')

@section('content')
<div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header" style="margin-top: 5%">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">{{trans('business-setup.branch_details')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{__('nav.attendance')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <a href="{{ url('attendance/create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Attendance</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0" id="attendance_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <th>Day</th>
                                    <th>check in</th>
                                    <th>check out</th>
                                    {{-- <th>day status</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>