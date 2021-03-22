<div id="edit_custom_delay_penalty" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('time_management.custom_delay_penalties')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="custom_delay_form">
                <div class="modal-body">
                    {{-- @csrf()
                    @method('PUT') --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.administration')}}<span class="text-danger">*</span></label>
                                <select class="form-control" name="administration_id" id="custom_select">
                                    @foreach(App\BusinessAdministration::all() as $administr)
                                        <option value="{{$administr->id}}">{{$administr->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('time_management.minute_deduction')}}<span class="text-danger">*</span></label>
                                <input type="number" name="minute_deduction" class="form-control" id="custom_minute">
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
    function setTwoNumberDecimal(event) {
        this.value = parseFloat(this.value).toFixed(2);
    }
</script>

@section('js')
    {{-- <script type="text/javascript">
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

    </script> --}}
@endsection
