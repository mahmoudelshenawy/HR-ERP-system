<div id="add_leave_type" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.add_leave_type')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <form method="post" action="{{url('time-management/leave-types')}}" >
                <div class="modal-body">
                    @csrf()
                <div class="row">
                    <div class="col-6">
                        <label class="col-form-label">{{__('time_management.leave_name')}} <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" >
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="col-form-label">{{__('time_management.type_cat')}}<span class="text-danger">*</span></label>
                            <select class="js-example-matcher-start" name="type_cat" id="type_cat">
                                @foreach(config('enums.type_cat') as $type)
                                    <option value="{{$type}}">{{(__('time_management.'.$type))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12" id="deduct_details" style="display: none">
                        <div class="col-6" >
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.deduct_type')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="deduct_type" >
                                    <option value="daily">{{(__('time_management.daily'))}}</option>
                                    <option value="fixed_amount">{{(__('time_management.fixed_amount'))}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.amount')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="amount" >
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {

            $('#type_cat').on('change',function(e) {

                var type_cat = e.target.value;

                $.ajax({
                    url:"{{ url('time-management/leave-types') }}",
                    type:"get",
                    data: {
                        type_cat: type_cat
                    },
                    success:function (data) {
                        var deduct_details = document.getElementById('deduct_details')
                        if(data['type_cat'] === 'deducted_salary' || data['type_cat'] === 'both_deducted'){
                            deduct_details.style.display = 'block'
                        }else if(data['type_cat'] === 'deducted_annual_leave_count' || data['type_cat'] === 'not_deducted'){
                            deduct_details.style.display = 'none'
                        }
                    }
                })
            });
        });

    </script>
@endsection
