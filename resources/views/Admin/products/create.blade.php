Add Employee Modal -->
<div id="add_product" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="reset" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-create-product" action="{{ url('admin/add-product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div  class="col-md-12 text-center">
                            <div class="edit-img">
                                <div class="fileupload btn">
                                    <span class="btn-text">add images product</span>
                                    <input name="image_product[]" class="upload" type="file" multiple>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Product Name <span class="text-danger">*</span></label>
                                <input name="name" class="form-control name" type="text">
                                <div class="err_name text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Type Product <span class="text-danger">*</span></label>
                                <select name="type" class="select">
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                    @endforeach
                                </select>
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sizes 
                                    <span class="text-danger">*</span>
                                    <button type="button" class="btn btn-primary add-size-product"><i class="fa fa-plus"></i> add</button>
                                </label>
                                <select name="listsize" class="select" id="opsize" style="width:10px;">
                                    @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size_number }}</option>
                                    @endforeach
                                </select>
                                <div class="err_size_add text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-add-size">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-review review-table mb-0" id="table_alterations">
                                    <thead>
                                        <tr>
                                            <th >Number</th>
                                            <th >Amount</th>
                                            <th style="width: 20%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="form-add-lisize">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        <button type="reset" class="btn btn-primary submit-btn reset-create-product">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Employee Modal