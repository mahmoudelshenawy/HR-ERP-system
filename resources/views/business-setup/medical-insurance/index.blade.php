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
                        <h3 class="page-title">{{__('business-setup.medical_insurance_data')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('business-setup.medical_insurance_data')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_medical_insurance"><i class="fa fa-plus"></i>
                            {{__('business-setup.add_medical_insurance')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card-body card">
                <div class="col-md-12 ">
                    <div class="table-responsive ">
                        {!! $dataTable->table(['class'=>' dataTable  table-radius'],true) !!}
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
    @include('business-setup.medical-insurance.add')

@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush

