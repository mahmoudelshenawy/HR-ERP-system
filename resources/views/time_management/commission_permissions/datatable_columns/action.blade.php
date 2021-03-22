<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_commission_permissions{{$id}}"><i class="fa fa-trash " ></i> </a>

<a class=" btn-sm btn-outline-info edit_custom_delay_btn" href="#" id="edit_custom_delay_btn" data-toggle="modal" onclick="getCommissionPermissionsData({{$id}})" data-target="#edit_commission_permissions_{{$id}}"><i class="fa fa-pencil " ></i> </a>


@include('time_management.commission_permissions.delete')

<div id="edit_commission_permissions_{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.commission_permissions')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form class="commission_permissions_form" onsubmit="handleCommissionPermissionsSubmit({{$id}})">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label style="display: block" class="col-form-label">{{__('business-setup.employee_name')}}<span class="text-danger">*</span></label>
                                {{-- <label for="employee_id">{{__('business-setup.employee_name')}}</label> --}}
                            <select class="js-example-matcher-start" name="employee_id" id="employee_id_{{$id}}">
                                    @foreach(App\EmployeeGeneralData::all() as $employee)
                                        <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                      
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.from')}}<span class="text-danger">*</span></label>
                                <input type="text" name="from" class="form-control datetimepicker" id="from_{{$id}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.to')}}<span class="text-danger">*</span></label>
                                <input type="text" name="to" class="form-control datetimepicker" id="to_{{$id}}">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(".js-example-matcher-start").select2({
        width: '100%',
        minHeight:'100%',
        lineHeight:'44px',
    });
    $('.datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: 'en'
    });
</script>
