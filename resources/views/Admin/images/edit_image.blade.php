	<!-- Edit Brand -->
	<div class="modal custom-modal fade" id="edit_image" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Brand</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id= "submit_form_edit_image" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-12">
								<div class="profile-img-wrap edit-img">
									<img class="inline-block output image-product" src="">
									<div class="fileupload btn">
										<span class="btn-text">edit</span>
										<input name="image_product" class="upload" type="file">
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Product <span class="text-danger"></span></label>
									<input name="product" id="product" type="text" class="form-control brand-Name" disabled>
									<div class="text-danger" id="err_name_brand"></div>
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button type="submit" name="upload_button" class="btn btn-primary submit-btn">Submit</button>	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Brand -->