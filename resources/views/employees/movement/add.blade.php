<!-- Add movement Modal -->
<div id="add_movement" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.add_movement')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{route('store_movement')}}" >
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.select_employee')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="employee_id" id="employee_id">
                                    <option disabled selected>{{__('employee.select_employee')}}</option>
                                @foreach(DB::table('employee_general_data')->where('statue','active')->get() as $employee)
                                    <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.new_branch')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="new_branch"  id="new_branch">
                                    <option disabled selected>{{__('employee.select_employee_first')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.job')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="new_job"  id="new_job">
                                    <option disabled selected>{{__('employee.select_new_branch_first')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="focus-label">{{trans('employee.movement_date')}}</label>
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="movement_date"  class="form-control floating datetimepicker" >
                                </div>
                                <label class="focus-label">{{trans('employee.movement_date')}}</label>
                            </div>
                        </div><br>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /Add business branch Modal -->



@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {

            $('#employee_id').on('change',function(e) {

                var employee_id = e.target.value;

                $.ajax({

                    url:"{{ route('ajax_get_new_branch') }}",
                    type:"POST",
                    data: {
                        employee_id: employee_id
                    },
                    success:function (new_branch) {
                        $('#new_branch').empty();
                        $('#new_branch').append(' <option value="">{{__('employee.select_new_branch')}}</option>')
                        op = ' <option value=""></option>'
                        var i;
                        for (i = 0; i < new_branch.length; i++) {
                            op = ' <option value="'+new_branch[i].id+'">'+new_branch[i].name+'</option>';
                            $('#new_branch').append(op)
                        }

                    }
                })
            });
            $('#new_branch').on('change',function(e) {

                var branch_id = e.target.value;

                $.ajax({

                    url:"{{ route('ajax_get_new_job') }}",
                    type:"POST",
                    data: {
                        branch_id: branch_id
                    },
                    success:function (jobs) {
                        $('#new_job').empty();
                        op = ' <option value=""></option>'
                        $('#new_job').append(' <option value="">{{__('employee.select_new_job')}}</option>')
                        var i;
                        for (i = 0; i < jobs.length; i++) {
                            op = ' <option value="'+jobs[i].id+'">'+jobs[i].name+'</option>';
                            $('#new_job').append (op)
                        }

                    }
                })
            });

        });

    </script>
@endsection
