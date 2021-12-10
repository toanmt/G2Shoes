<!-- Add Brand -->
<div class="modal custom-modal fade" id="add_brand" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Thêm thương hiệu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id= "submit_form" action="{{ url('admin/add-brand') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Tên thương hiệu</label>
								<input name="brandName" type="text" class="form-control">
								<div class="text-danger" id="err_name_brand"></div>
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
<!-- /Add Brand -->