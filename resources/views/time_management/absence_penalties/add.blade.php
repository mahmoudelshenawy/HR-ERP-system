<div id="add_absent_penalty" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.absence_penalties')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{url('time-management/absence-penalties')}}" >
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.branch')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="branch_id[]" multiple>
                                    @foreach(App\BusinessBranch::all() as $branch)
                                        <option value="{{$branch->id}}" selected>{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.delay_count')}}<span class="text-danger">*</span></label>
                                <input type="number" name="count" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.delay_deduct')}}<span class="text-danger">*</span></label>
                                <input type="number" name="penalty" class="form-control" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.max_penalty_option')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="max_penalty_option" id="max_penalty_option">
                                    <option  value="0" > {{__('time_management.inactive_employee')}}</option>
                                    <option  value="1"> {{__('time_management.max_delay_penalty_applicant')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6" style="display:none;" id="max_penalty">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.delay_deduct')}}<span class="text-danger">*</span></label>
                                <input type="number" name="max_penalty" class="form-control"  value="0">
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



<script>
    function setTwoNumberDecimal(event) {
        this.value = parseFloat(this.value).toFixed(2);
    }
</script>

@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {

            $('#max_penalty_option').on('change',function(e) {

                var max_penalty_option = e.target.value;

                $.ajax({
                    url:"{{ url('time-management/absence-penalties') }}",
                    type:"get",
                    data: {
                        max_penalty_option: max_penalty_option
                    },
                    success:function (data) {
                        var max_penalty = document.getElementById('max_penalty')
                        if(data['max_penalty_option'] == 1){
                            max_penalty.style.display = 'block'
                        }else if(data['max_penalty_option'] == 0){
                            max_penalty.style.display = 'none'
                        }
                    }
                })
            });
        });

    </script>
@endsection
