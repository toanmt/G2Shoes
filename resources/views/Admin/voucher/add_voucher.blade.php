 <!-- Add Tax Modal -->
 <div id="add_voucher" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm mã giảm giá</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-create-voucher" action="{{ url('admin/add-voucher') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Tên mã giảm giá<span class="text-danger">*</span></label>
                                <input name="voucher_name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Phần trăm giảm (%) <span class="text-danger">*</span> </label>
                                <input name="percent" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label class="col-form-label">Số lượng <span class="text-danger">*</span></label>
                                <input name="amount" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label class="col-form-label">Ngày kết thúc <span class="text-danger">*</span></label>
                                <div class="cal-icon"><input name="expired_date" class="form-control datetimepicker" type="text"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Trạng thái <span class="text-danger">*</span></label>
                                <select name="status" class="select">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Khóa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Tax Modal -->