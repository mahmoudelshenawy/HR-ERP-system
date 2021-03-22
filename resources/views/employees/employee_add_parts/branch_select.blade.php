<div id="branch_select" class="modal note-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{__('employee.select_branch')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form method="get" action="{{url('employees/add/')}}" >
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <select class="js-example-matcher-start" name="branch" >
                                @foreach(App\BusinessBranch::all() as $branch)
                                    <option  value="{{$branch->id}}">{{$branch->name}}</option>
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
