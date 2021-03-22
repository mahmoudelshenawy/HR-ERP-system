<div id="edit_delay_penalty{{$id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.delay_penalties')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{url('time-management/delay-penalties')}}" >
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-6">
                            <label class="col-form-label">{{__('employee.branch')}}<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="js-example-matcher-start" name="branch_id[]" multiple>
                                    <option selected value="0"> {{__('general.select')}}</option>
                                    @foreach(App\BusinessBranch::all() as $branch)
                                        <option value="{{$branch->id}}" {{$branch_id == $branch->id?'selected':''}}>{{$branch->name}}</option>
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
                                <label class="col-form-label">{{__('time_management.delay_minutes')}}<span class="text-danger">*</span></label>
                                <input type="number" name="delay_minutes" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.delay_deduct')}}<span class="text-danger">*</span></label>
                                <input type="number" name="penalty" class="form-control" step=".01">
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">{{__('time_management.max_penalty_option')}}<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="js-example-matcher-start" name="max_penalty_option" id="max_penalty_option{{$id}}">
                                    <option  value="0" {{$max_penalty == 0?'selected':''}}> {{__('time_management.inactive_employee')}}</option>
                                    <option  value="1" {{$max_penalty != 0?'selected':''}}> {{__('time_management.max_delay_penalty_applicant')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6" style="display:none;" id="max_penalty{{$id}}">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.delay_deduct')}}<span class="text-danger">*</span></label>
                                <input type="number" name="max_penalty" class="form-control" step=".01" value="0">
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

            var  id = {{$id}}
            $('#max_penalty_option+id').on('change',function(e) {

                var max_penalty_option = e.target.value;

                $.ajax({
                    url:"{{ url('time-management/delay-penalties') }}",
                    type:"get",
                    data: {
                        max_penalty_option: max_penalty_option
                    },
                    success:function (data) {
                        var max_penalty = document.getElementById('max_penalty'+id)
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
