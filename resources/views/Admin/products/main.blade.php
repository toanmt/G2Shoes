@extends('Admin.layout.main')

@section('title')
<title>Sản phẩm</title>
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
                    <h3 class="page-title">Sản phẩm</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/login') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ul>
                </div>

                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#size_manage"><i class="fa fa-arrows-h" aria-hidden="true"></i> Size</a>  
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_product"><i class="fa fa-plus"></i> Thêm sản phẩm</a>  
                </div>
                
            </div>
        </div>
        <!-- /Page Header -->
        
        <!-- Search Filter -->
        <form id="frm-search-product" action="{{ url('admin/product-search') }}" method="POST">
            @csrf
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <input name="name" type="text" class="form-control floating">
                        <label class="focus-label">Tên sản phẩm</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <input name="price" type="text" class="form-control floating">
                        <label class="focus-label">Giá</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        <select name="size" class="select floating">
                            <option value="">--- Chọn size cần tìm kiếm ----</option>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">Size {{ $size->size_number }}</option>
                            @endforeach 
                        </select>
                        <label class="focus-label">Sizes</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <button type="submit" class="btn btn-success btn-block btn-search-product"> Tìm kiếm </button>  
                </div>
            </div>
        </form>
        <!-- Search Filter -->
        
        @yield('section')
    </div>
    <!-- /Page Content -->
    
    @include('Admin.products.create')
    
    @include('Admin.products.edit')

    @include('Admin.products.delete')
    
    @include('Admin.products.size')

</div>
<!-- /Page Wrapper -->
@endsection