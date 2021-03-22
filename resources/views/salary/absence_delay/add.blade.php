<div id="add_absence_delay_penalties" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('salary.absence_delay_penalties')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{url('salary/absence_delay_penalty')}}" >
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.employee_name')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="employee_id">
                                    @foreach(App\EmployeeGeneralData::all() as $employee)
                                        <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <?php $months = ['January' , 'February' , 'March' , 'April' , 'May' , 'June' , 'July' , 'August' , 'September' , 'October' , 'November', 'December']; ?>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('salary.month')}}<span class="text-danger">*</span></label>
                                <select class="js-example-matcher-start" name="month">
                                    @foreach($months as $index=>$month)
                                        <option value="{{$index + 1}}">{{ trans('general.' . $month) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('salary.absence_subtract')}}<span class="text-danger">*</span></label>
                                <input type="number" name="absence_subtract" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('salary.delay_subtract')}}<span class="text-danger">*</span></label>
                                <input type="number" name="delay_subtract" class="form-control">
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
