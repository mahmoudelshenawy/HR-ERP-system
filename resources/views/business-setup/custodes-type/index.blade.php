@extends('layouts.app')

@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

          @include('layouts.partials.flash-messages')
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{__('nav.custady_type')}}</h3>

                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_custadytype"><i class="fa fa-plus"></i>
                            {{__('business-setup.add_custady_type')}}</a>
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
    @include('business-setup.custodes-type.add')

@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush

