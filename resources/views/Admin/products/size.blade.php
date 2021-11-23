<div id="size_manage" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Size Management</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-create-size" action="{{ url('admin/add-size') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">                        
                        <div class="col-sm-11">
                            <div class="form-group">
                                <label class="col-form-label">Number Size <span class="text-danger">*</span></label>
                                <input name="number_size" class="form-control number-size" type="text">
                                <div class="err_username text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    @foreach ($sizes as $size)
                    <div style="margin: 12px;">
                        <div class="card" style="width:100px;">
                            <button type="button" class="close delete-size" href="#" data-toggle="modal" data-id="{{ $size->id}}" style="background-color: red;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="card-body">
                                <h3>{{ $size->size_number }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
