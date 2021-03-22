<div id="add_net_salary" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('salary.calculate_net_salary')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
<div class="modal-body">
    <form action="{{ url('salary/net_salary/calculate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6 mx-auto">
                <?php $months = ['January' , 'February' , 'March' , 'April' , 'May' , 'June' , 'July' , 'August' , 'September' , 'October' , 'November', 'December']; ?>
                    <div class="form-group">
                        <label class="col-form-label">{{__('salary.month')}}<span class="text-danger">*</span></label>
                        <select class="js-example-matcher-start" name="month">
                            @foreach($months as $index=>$month)
                                <option value="{{$index + 1}}">{{ trans('general.' . $month) }}</option>
                            @endforeach
                        </select>
                    </div>
                
            </div>   
</div>
    <div class="submit-section">
        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
    </div>
    </form>
</div>
        </div>
    </div>
</div>
