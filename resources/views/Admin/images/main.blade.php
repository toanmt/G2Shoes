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
                    <h3 class="page-title">Images</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Images</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <div class="view-icons">
                        <a href="{{ url('admin/images') }}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                        <a href="{{ url('admin/image-lists') }}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                    </div>
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
                        <input name="user" type="text" class="form-control floating">
                        <label class="focus-label">image Username</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <input name="name" type="text" class="form-control floating">
                        <label class="focus-label">image Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        <select class="select floating"> 
                            <option>Select Designation</option>
                            <option>Web Developer</option>
                            <option>Web Designer</option>
                            <option>Android Developer</option>
                            <option>Ios Developer</option>
                        </select>
                        <label class="focus-label">Designation</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <button type="submit" class="btn btn-success btn-block btn-search-image"> Search </button>  
                </div>
            </div>
        </form>
        <!-- Search Filter -->
        
        @yield('section')
    </div>
    <!-- /Page Content -->

</div>
<!-- /Page Wrapper -->
@endsection