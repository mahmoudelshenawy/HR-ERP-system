@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="container">

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-home"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{\App\BusinessBranch::count()}}</h3>
                                    <span>الفروع</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-location-arrow"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{\App\BusinessAdministration::count()}}</h3>
                                    <span>الأدارات</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-database"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{\App\BusinessDepartment::count()}}</h3>
                                    <span>الأقسام</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{\App\BusinessJob::count()}}</h3>
                                    <span>الوظائف</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <h4 class="card-title">{{trans('nav.employees')}}</h4>
                                    <div class="statistics">
                                        <div class="row">
                                            <div class="col-md-6 col-6 text-center">
                                                <div class="stats-box mb-4">
                                                    <p>{{__('general.total_employees')}}</p>
                                                    <h3>{{App\EmployeeGeneralData::count()}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6 text-center">
                                                <div class="stats-box mb-4">
                                                    <p>{{__('general.in_work_employees')}}</p>
                                                    <h3>{{App\EmployeeGeneralData::where('statue','active')->count()}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress mb-4">
                                        <small class="text-warning">
                                            {{trans('general.resignation') .' '. App\EmployeeGeneralData::where('statue','resignation')->count()}}
                                        </small>

                                        <small class="text-danger" style="margin: auto 30px">
                                            {{trans('general.inactive') .' '. App\EmployeeGeneralData::where('statue','inactive')->count()}}
                                        </small>
                                    </div>
                                    <div>
                                        @foreach(DB::table('business_branches')->get() as $branch)
                                            <p><i class="fa fa-dot-circle-o text-purple mr-2"></i>{{$branch->name}}
                                                <span class="float-right">{{App\EmployeeGeneralData::where('branch_id',$branch->id)->count()}}</span>
                                                <small class="float-right text-success">{{App\EmployeeGeneralData::where('branch_id',$branch->id)->where('statue','active')->count()}}</small>
                                            </p>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card col-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <span class="d-block"></span>
                                    </div>
                                    <div>
                                        <span class="text-success">{{App\EmployeeGeneralData::where('statue','active')->count()}}</span>
                                    </div>
                                </div>
                                <h3 class="mb-3">{{App\EmployeeGeneralData::where('statue','active')->where('contract_ending_date','<',date('d'))->count() > 0 ? '+'.App\EmployeeGeneralData::where('contract_ending_date','<',date('d'))->count(): App\EmployeeGeneralData::where('contract_ending_date','<',date('d'))->count()}}</h3>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{App\EmployeeGeneralData::where('statue','active')->where('contract_ending_date','<',date('d'))->count() % App\EmployeeGeneralData::where('statue','active')->count()}}%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{trans('general.contract_ended')}} <span class="text-muted">{{App\EmployeeGeneralData::where('statue','active')->count()}}</span></p><br>


                                <h3 class="mb-3">{{App\EmployeeGeneralData::where('statue','active')->where('residency_expiry_date','<',date('d'))->count() > 0 ? '+'.App\EmployeeGeneralData::where('residency_expiry_date','<',date('d'))->count(): App\EmployeeGeneralData::where('contract_ending_date','<',date('d'))->count()}}</h3>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{App\EmployeeGeneralData::where('statue','active')->where('residency_expiry_date','<',date('d'))->count() % App\EmployeeGeneralData::where('statue','active')->count()}}%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{trans('general.resident_ended')}} <span class="text-muted">{{App\EmployeeGeneralData::where('statue','active')->count()}}</span></p>
                                <br>


                                <h3 class="mb-3">{{App\EmployeeGeneralData::where('statue','active')->where('passport_expiry_date','<',date('d'))->count() > 0 ? '+'.App\EmployeeGeneralData::where('passport_expiry_date','<',date('d'))->count(): App\EmployeeGeneralData::where('contract_ending_date','<',date('d'))->count()}}</h3>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{App\EmployeeGeneralData::where('statue','active')->where('passport_expiry_date','<',date('d'))->count() % App\EmployeeGeneralData::where('statue','active')->count()}}%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{trans('general.passport_ended')}} <span class="text-muted">{{App\EmployeeGeneralData::where('statue','active')->count()}}</span></p>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <h4 class="card-title">الحضور اليوم<span class="badge bg-inverse-danger ml-2">0</span></h4>
                                    <div class="load-more text-center">
                                        <a class="text-dark" href="javascript:void(0);"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
        </div>

    </div>

@endsection
