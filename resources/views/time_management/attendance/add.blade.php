@extends('layouts.app')

@section('content')
    <div class="page-wrapper" >
        <!-- Page Content -->
        <div class="content container-fluid" >
            <!-- Page Header -->
            <div class="page-header" style="margin-top: 50px">
                    <div class="col-sm-12">
                        <h3 class="page-title">{{trans('employee.addAttendance')}}</h3>
                </div>
            </div>
            <!-- menue Header -->
            <!-- /Page Header -->
            <?php $employees = \App\EmployeeGeneralData::all(['code' , 'employee_name']) ?>
@include('layouts.partials.flash-messages')
<div class="row mt-4">
    <div class="col-10 mx-auto">
        <form action="{{ url('attendance') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label for="code">{{ trans('employee.employee') }}</label>
                    <select name="employee_code" id="code" class="form-control js-example-matcher-start">
                        <option>choose employee</option>
                        @foreach ($employees as $employee)
                    <option value="{{$employee->code}}">{{$employee->employee_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="day">{{ trans('employee.day') }}</label>
                    <input type="text" name="day" id="day" class="form-control floating datetimepicker @error('day') is-invalid @enderror" value=""/>
                    @error('day')
                <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="check_in">{{ trans('employee.check_in') }}</label>
                    <input type="time" name="check_in" id="check_in" class="form-control text-success @error('check_in') is-invalid @enderror"/>
                    @error('check_in')
                <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="check_out">{{ trans('employee.check_out') }}</label>
                    <input type="time" name="check_out" id="check_out" class="form-control text-danger @error('check_out') is-invalid @enderror"/>
                    @error('check_out')
                <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="submit-section">
                <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
            </div>
        </form>
    </div>
</div>
        </div>
    </div>