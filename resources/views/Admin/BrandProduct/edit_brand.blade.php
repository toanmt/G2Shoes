<!-- Edit Brand -->
<div class="modal custom-modal fade" id="edit_brand" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Sửa thương hiệu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id= "submit_form_edit_brand" action="{{ url('admin/edit-brand') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Tên thương hiệu</label>
								<input name="brandName" type="text" class="form-control brand-Name">
								<div class="text-danger" id="err_name_brand"></div>
							</div>
						</div>
					</div>
					<div class="submit-section">
						<button type="submit" name="upload_button" class="btn btn-primary submit-btn">Lưu</button>	
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	<!-- /Edit Brand -->