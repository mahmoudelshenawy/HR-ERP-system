<a href="{{ url('attendance/' . $id . '/edit') }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_attendance"><i class="fa fa-trash"></i></a>

<div class="modal custom-modal fade show" id="delete_attendance" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Attendance</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('attendance.destroy', $id) }}" method="POST">
                    <div class="row">           
                            @csrf
                            @method('delete')
                        <div class="col-6">
                            <button href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</button>
                        </div>
                    
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
