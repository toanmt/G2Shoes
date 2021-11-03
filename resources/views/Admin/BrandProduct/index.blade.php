@extends('Admin.layout.main')
@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Brand Product</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('admin/login') }}">Dashboard</a></li>
						<li class="breadcrumb-item active">Product</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_brand"><i class="fa fa-plus"></i>Add New Brand Product</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0">
						<thead>
							<tr>
								<th>#</th>
								<th>Brand Name </th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($brands as $brand)
							<tr>
								<td>{{ $brand->id}}</td>
								<td>{{ $brand->brand_name}}</td>
								<td class="text-right">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item btn-edit-brand" href="#" data-id="{{ $brand->id}}" data-toggle="modal" data-target="#edit_brand"><i class="fa fa-pencil m-r-5"></i> Edit</a>
											<a href="#" class="dropdown-item btn-delete-brand" data-id="{{ $brand->id}}" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Content -->

	@include('Admin.BrandProduct.add_brand')
	@include('Admin.BrandProduct.edit_brand')
	@include('Admin.BrandProduct.del_brand')

</div>
<!-- /Page Wrapper -->
@endsection