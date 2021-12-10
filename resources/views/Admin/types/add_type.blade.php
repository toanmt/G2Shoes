<!-- Add Type -->
<div class="modal custom-modal fade" id="add_type" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Thêm loại mới</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id= "submit_form_add_type" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Tên loại</label>
								<input name="typeName" type="text" class="form-control">
								<div class="text-danger" id="err_name_type"></div>
							</div>
						</div>
					</div>
					<div class="submit-section">
						<button type="submit" name="upload_button" class="btn btn-primary submit-btn">Thêm</button>	
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Type -->