<!-- Add Employee Modal -->
<div id="add_employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-create-product" action="{{ url('admin/add-product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap edit-img">
                                <img class="inline-block output" src="">
                                <div class="fileupload btn">
                                    <span class="btn-text">add</span>
                                    <input name="image_product" class="upload" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Price <span class="text-danger">*</span></label>
                                <input name="price" class="form-control price" type="text">
                                <div class="err_price text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Discount <span class="text-danger">*</span></label>
                                <input name="discount" class="form-control discount" type="text">
                                <div class="err_discount text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Product Name <span class="text-danger">*</span></label>
                                <input name="name" class="form-control name" type="text">
                                <div class="err_name text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control product-description" cols="30" rows="10"></textarea>
                                <div class="err_name text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Loại sản phẩm <span class="text-danger">*</span></label>
                                <select name="category" class="select">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <label class="col-form-label">Size</label>
                    <div class="table-responsive m-t-15">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    @foreach ($sizes as $size)
                                        <th class="text-center">{{ $size->Number }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($sizes as $size)
                                        <td class="text-center">
                                            <input name="size[]" type="checkbox" value="{{ $size->SizeID }}">
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Employee Modal -->