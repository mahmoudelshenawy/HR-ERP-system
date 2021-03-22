
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
                        <h3 class="page-title">{{__('employee.employees')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('employee.employees')}}</li>
                        </ul>
                    </div>
                    <div class="view-icons">
                        <a href="{{url('employees')}}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                        <a href="{{url('employees/list')}}" class="list-view btn btn-link" id="employee_list"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#branch_select"><i class="fa fa-plus"></i>
                            {{__('employee.add_employee')}}</a>
                    </div>

                </div>
            </div>

            <!-- /Page Header -->
    <!-- Search Filter -->
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
                    <select class="select" name="branch" id="branch">
                        <option value="0">{{__('general.all_branches')}}</option>
                        @foreach(App\BusinessBranch::all() as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                        @endforeach
                    </select>
                    <label class="focus-label text-muted small">{{__('employee.branch')}}</label>

                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="#" class="btn btn-success btn-block" id="fillter"> {{__('general.search')}} </a>
            </div>
        </div>
        <!-- /Search Filter -->
        <div class="row staff-grid-row" id="employees_section">
            @if(count($employeeData) > 0)
                @foreach($employeeData as $employee)
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="{{url('employees/'.$employee->id)}}" class="avatar"> <img src="@if($employee->employee_img)
                                    {{asset('uploads/files/employees/code/'.$employee->code.'/'.$employee->employee_img)}}@else
                                    {{asset('img/user.jpg')}} @endif" style="max-height: 100%;max-width: 100%"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a class="  btn-rounded border-secondary" >@if($employee->country_id)
                                        <img src="https://www.countryflags.io/{{DB::table('countries')->where('id',$employee->country_id)->value('img')}}/shiny/16.png">
                                    @endif
                                </a>
                            </div>
                            <div class="small text-danger">{{$employee->code}}</div>
                            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{url('employees/'.$employee->id)}}" ><span class="text-justify">{{strtolower($employee->employee_name)}}</span></a></h4>
                            <div class="small text-muted">{{DB::table('business_jobs')->where('id',$employee->job_id)->value('name')}}</div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {!! $employeeData->links() !!}
                </div>
            @else
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3 offset-4" style="padding-top: 80px">
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a href="#" class="avatar" onclick="javascript:window.location.reload()"> <img src="{{asset('img/user.jpg')}}" style="max-height: 100%;max-width: 100%"></a>
                        </div>
                        <div class="dropdown profile-action">
                        </div>
                        <div class="small text-danger">{{0}}</div>
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a onclick="javascript:window.location.reload()" href="#" ><span class="text-justify">{{__('general.add_new_data')}}</span></a></h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
        <!-- /Page Content -->
        @include('employees.employee_add_parts.branch_select')
</div>
    <!-- /Page Wrapper -->

@endsection

@section('js')
    <script>
        $(document).ready(function (){
            $('#fillter').click(function (e) {
                e.preventDefault()
                var branch = $('#branch').val()
                var name = $('#name').val()
                var code = $('#code').val()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var page = $(this).attr('href').split('page=')[1]
                $.ajax({
                    url:"/employees?page="+page,
                    type:"post",
                    data: {
                        branch : branch,
                        name : name,
                        code : code,
                    },
                    success:function (data) {
                        $('#employees_section').empty();
                        $('#employees_section').append(data['html']);
                    }
                })
            })
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });
            function fetch_data(page)
            {
                var branch = $('#branch').val()
                var name = $('#name').val()
                var code = $('#code').val()
                $.ajax({
                    url:"/employees?page="+page,
                    data: {
                        branch : branch,
                        name : name,
                        code : code,
                    },
                    success:function(data)
                    {
                        $('#employees_section').html(data['html']);
                    }
                });
            }

        });


    </script>
    @endsection
