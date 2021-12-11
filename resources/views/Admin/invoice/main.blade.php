@extends('Admin.layout.main')

@section('title')
<title>Hóa đơn</title>
@endsection

@section('content')
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Hóa đơn</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/login') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Hóa đơn</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <!-- Search Filter -->
        <form id="frm-search-invoice" action="{{ url('/admin/search-invoice') }}" method="POST">
            @csrf
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input name="created_date" class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">Ngày lập</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        <select name="status" class="select floating">
                            <option value="">Tất cả</option> 
                            <option value="0">Chờ</option>
                            <option value="1">Hoàn thành</option>
                            <option value="2">Đã hủy</option>
                        </select>
                        <label class="focus-label">Trạng thái</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <button type="submit" class="btn btn-success btn-block"> Tìm </button>  
                </div>     
            </div>
        </form>
        <!-- /Search Filter -->
        @yield('section')
    </div>
    <!-- /Page Content -->
    
</div>
<!-- /Page Wrapper -->
@endsection
