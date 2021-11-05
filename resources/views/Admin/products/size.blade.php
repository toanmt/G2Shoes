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
                <div class="table-responsive m-t-15">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th class="text-center">Number</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody id="table-size">
                            <?php $count = 0; ?>
                            @foreach ($sizes as $size)
                                <tr id="del-{{ $size->id }}">
                                    <td class="text-center" id="size-{{ $size->id}}">
                                        {{ $size->size_number }}
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item edit-size" href="#" data-toggle="modal" data-id="{{ $size->id}}" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item delete-size" href="#" data-toggle="modal" data-id="{{ $size->id}}" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
