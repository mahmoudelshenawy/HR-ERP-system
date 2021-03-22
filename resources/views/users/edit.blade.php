@extends('layouts.app')


@section('content')
<div class="page-wrapper" style="min-height: 625px; padding-top: 0px">
    <!-- Page Content -->
    <div class="content container-fluid">
    <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{__('user.edit_user')}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/users')}}">{{__('user.users')}}</a></li>
                        <li class="breadcrumb-item active">{{__('user.edit_user')}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
<div class="row">
    <div class="col-md-11">
    <form action="{{route('users.update' , $user->id)}}" method="post">
    @csrf
    @method('put')
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{__('user.name')}}<span class="text-danger">*</span></label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{$user->name}}">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{__('user.email')}}<span class="text-danger">*</span></label>
        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{$user->email}}">
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{__('user.password')}}</label>
            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{__('user.password_confirmation')}}</label>
            <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation">
            @error('password_confirmation')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{__('user.employee')}} <span class="text-danger"></span></label>
            <?php $allEmployees = \App\EmployeeGeneralData::all(['id' , 'employee_name']) ?>
            <select name="employee_id" class="js-example-matcher-start @error('employee_id') is-invalid @enderror">
                @if(!$user->employee_id)
                    <option selected disabled>{{__('employee.select')}}</option>
                @endif
                @foreach($allEmployees as $employee)
                    <option value="{{$employee->id}}" {{$user->employee_id == $employee->id ? 'selected' : ''}}>{{$employee->employee_name}}</option>
                @endforeach
            </select>
            @error('employee_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
<div class="table-responsive m-t-15">
    <table class="table table-striped custom-table">
        <thead>
            <tr>
                <th>{{ trans('user.permissions') }}</th>
                <th class="text-center">Read</th>
                <th class="text-center">Create</th>
                <th class="text-center">Update</th>
                <th class="text-center">Delete</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ trans('user.users') }}</td>
                <td class="text-center">
                    <input name="permissions[]" type="checkbox" value="users-read" {{$user->hasPermission('users-read') ? 'checked' : ''}}>
                </td>
                <td class="text-center">
                    <input  name="permissions[]" type="checkbox" value="users-create" {{$user->hasPermission('users-create') ? 'checked' : ''}}>
                </td>
                <td class="text-center">
                    <input  name="permissions[]" type="checkbox" value="users-update" {{$user->hasPermission('users-update') ? 'checked' : ''}}>
                </td>
                <td class="text-center">
                    <input  name="permissions[]" type="checkbox" value="users-delete" {{$user->hasPermission('users-delete') ? 'checked' : ''}}>
                </td>
            </tr>
            <tr>
                <td>{{ trans('user.employees') }}</td>
                 <td class="text-center">
                    <input name="permissions[]" type="checkbox" value="read_employees">
                </td>
                <td class="text-center">
                    <input  name="permissions[]" type="checkbox" value="create_employees">
                </td>
                <td class="text-center">
                    <input  name="permissions[]" type="checkbox" value="update_employees">
                </td>
                <td class="text-center">
                    <input  name="permissions[]" type="checkbox" value="delete_employees">
                </td>
            </tr>
            <tr>
                <td>{{ trans('user.businessSettings') }}</td>
                <td class="text-center">
                    <input name="permissions[]" type="checkbox" value="read_businessSettings">
                </td>
                <td class="text-center">
                    <input  name="permissions[]" type="checkbox" value="create_businessSettings">
                </td>
                <td class="text-center">
                    <input  name="permissions[]" type="checkbox" value="update_businessSettings">
                </td>
                <td class="text-center">
                    <input  name="permissions[]" type="checkbox" value="delete_businessSettings">
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="submit-section">
    <button type="submit" class="btn btn-primary submit-btn">{{__('general.submit')}}</button>
 </div>

</form>
    </div>
</div>
    </div>
</div>
@endsection
