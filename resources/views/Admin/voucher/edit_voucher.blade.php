<!-- Edit Tax Modal -->
<div id="edit_voucher" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa mã giảm giá</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-edit-voucher" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Tên mã giảm giá <span class="text-danger">*</span></label>
                                <input name="voucher_name" class="form-control edit-name-voucher" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Phần trăm giảm (%) <span class="text-danger">*</span> </label>
                                <input name="percent" class="form-control edit-percent-voucher" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label class="col-form-label">Số lượng <span class="text-danger">*</span></label>
                                <input name="amount" type="text" class="form-control edit-amount-voucher">
                            </div>
                        </div>
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label class="col-form-label">Ngày kết thúc <span class="text-danger">*</span></label>
                                <div class="cal-icon"><input name="expired_date" class="form-control datetimepicker edit-date-voucher" type="text"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Trạng thái <span class="text-danger">*</span></label>
                                <select name="status" class="select edit-status-voucher">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Khóa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Tax Modal -->