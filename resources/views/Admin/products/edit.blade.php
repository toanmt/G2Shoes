<!-- Edit Employee Modal -->
<div id="edit_product" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-edit-product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div  class="col-md-12 text-center">
                            <div class="edit-img abc edit-img-product">
                                <div class="fileupload btn">
                                    <span class="btn-text">Thêm ảnh sản phẩm</span>
                                    <input name="image_product[]" class="upload" type="file" multiple>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Giá <span class="text-danger">*</span></label>
                                <input name="price" class="form-control price edit-price" type="text">
                                <div class="err_price text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Giảm giá <span class="text-danger">*</span></label>
                                <input name="discount" class="form-control discount edit-discount" type="text">
                                <div class="err_discount text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                                <input name="name" class="form-control name edit-name" type="text">
                                <div class="err_name text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Loại sản phẩm<span class="text-danger">*</span></label>
                                <select name="type" class="select edit-type">
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <label class="col-form-label">Size</label>
                    <div class="row">
                        @foreach ($sizes as $size)
                        <div class="col-sm-5 col-md-3">
                            {{ $size->size_number }}
                            <input name="sizes[]" class="edit-size-check check-{{ $size->id }}" type="checkbox" value="{{ $size->id }}">
                            <div class="form-group form-focus">
                                <input  class="amount-size amount-size-{{ $size->id }} edit-amount-input-{{ $size->id }} form-control" data-id ="{{ $size->id }}" name="size_amount[]" type="text" disabled>
                                <label class="focus-label text-amount-{{ $size->id }}">Số lượng</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Employee Modal -->