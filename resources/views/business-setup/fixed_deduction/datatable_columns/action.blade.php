<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_fixed_deduction{{$id}}"><i class="fa fa-trash " ></i> </a>

<a class=" btn-sm btn-outline-info edit_custom_delay_btn" href="#" id="edit_custom_delay_btn" data-toggle="modal" onclick="getFixedDeductionData({{$id}})" data-target="#edit_fixed_deduction_{{$id}}"><i class="fa fa-pencil " ></i> </a>


@include('business-setup.fixed_deduction.delete')

<div id="edit_fixed_deduction_{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.fixed_deduction')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form class="custom_delay_form" onsubmit="handleFixedDeductionSubmit({{$id}})">
                <div class="modal-body">
                    {{-- @csrf()
                    @method('PUT') --}}
                    <div class="row">
                       
                        <div class="col-8 mx-auto">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.name')}}<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name_{{$id}}">
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

