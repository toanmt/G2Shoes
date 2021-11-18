<!-- Edit Employee Modal -->
<div id="edit_product" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-edit-product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div  class="col-md-12 text-center">
                            <div class="edit-img abc">
                                <div class="fileupload btn">
                                    <span class="btn-text">edit images product</span>
                                    <input name="image_product[]" class="upload" type="file" multiple>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Price <span class="text-danger">*</span></label>
                                <input name="price" class="form-control price edit-price" type="text">
                                <div class="err_price text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Discount <span class="text-danger">*</span></label>
                                <input name="discount" class="form-control discount edit-discount" type="text">
                                <div class="err_discount text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Product Name <span class="text-danger">*</span></label>
                                <input name="name" class="form-control name edit-name" type="text">
                                <div class="err_name text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Type Product <span class="text-danger">*</span></label>
                                <select name="type" class="select edit-type">
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <label class="col-form-label">Size</label>
                    <div class="table-responsive m-t-15">
                        <!-- <table class="table table-striped custom-table">
                            <thead>
                                <th>Sizes</th>

                                @foreach ($sizes as $size)
                                <th class="text-center">{{ $size->size_number }}</th>
                                @endforeach

                            </thead>
                            <tbody>

                                <tr>
                                    <td>Size</td>
                                    @foreach ($sizes as $size)
                                    <td class="text-center">
                                        <input name="sizes[]" class="edit-size-check check-{{ $size->id }}" type="checkbox" value="{{ $size->id }}">
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    @foreach ($sizes as $size)
                                    <td class="text-center">
                                        <input style="width:40px;" class="amount-size-{{ $size->id }} edit-amount-input-{{ $size->id }}" name="size_amount[]" type="text" disabled>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table> -->
                        <table class="table table-bordered mb-0 custom-table">
                            <thead>
                                <th>Size</th>
                                <th>Check</th>
                                <th>Amount</th>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $size)
                                <tr>
                                    <td>{{ $size->size_number }}</td>
                                    <td><input name="sizes[]" class="edit-size-check check-{{ $size->id }}" type="checkbox" value="{{ $size->id }}"></td>
                                    <td><input style="width:40px;" class="amount-size-{{ $size->id }} edit-amount-input-{{ $size->id }}" name="size_amount[]" type="text" disabled></td>
                                </tr>
                                @endforeach
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
<!-- /Edit Employee Modal -->