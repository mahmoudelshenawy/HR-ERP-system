<div id="add_delay_penalty" class="modal custom-modal fade" role="dialog">
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
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.delay_minutes')}}<span class="text-danger">*</span></label>
                                <input type="number" name="delay_minutes" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.penalty_first_time')}}<span class="text-danger">*</span></label>
                                <input type="text" name="penalty_first_time" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.penalty_second_time')}}<span class="text-danger">*</span></label>
                                <input type="text" name="penalty_second_time" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.penalty_third_time')}}<span class="text-danger">*</span></label>
                                <input type="text" name="penalty_third_time" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.penalty_fourth_time')}}<span class="text-danger">*</span></label>
                                <input type="text" name="penalty_fourth_time" class="form-control">
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
                    url:"{{ url('time-management/delay-penalties') }}",
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
