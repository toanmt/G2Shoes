@extends('Admin.layout.main')

@section('title')
<title>Ảnh sản phẩm</title>
@endsection

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Images</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/login') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Images</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <!-- Search Filter -->
        <form id="frm-search" action="{{ url('admin/image-search') }}" method="POST">
            @csrf
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <input name="product_name" type="text" class="form-control floating">
                        <label class="focus-label">Tên sản phẩm</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <button type="submit" class="btn btn-success btn-block btn-search-image"> Search </button>  
                </div>
            </div>
        </form>
        <!-- Search Filter -->
        
        <div class="row staff-grid-row data-show">
            @foreach ($images as $image)
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="text-center">
                        <a><img width="100" height="100" src="{{ asset('Image/'.$image->image_name) }}" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item btn-edit-image" data-id="{{ $image->id }}" href="#" data-toggle="modal" data-target="#edit_image"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item btn-delete-image" data-id="{{ $image->id }}" href="#" data-toggle="modal" data-target="#delete_image"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <div class="small text-muted justify-content-center">{{ $image->products->product_name }}</div>
                </div>
            </div> 
            @endforeach
        </div>

        {!! $images->links("pagination::bootstrap-4") !!}
    </div>
    <!-- /Page Content -->
	@include('Admin.images.edit_image')
	@include('Admin.images.del_image')
</div>
<!-- /Page Wrapper -->
@endsection