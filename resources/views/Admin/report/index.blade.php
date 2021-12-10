@extends('Admin.layout.main')

@section('title')
<title>Thống kê</title>
@endsection

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Báo cáo hóa đơn</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/login') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Báo cáo hóa đơn</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->
        <form id="frm_filter_report" action="{{ url('/admin/filterReport') }}" method="POST">
            @csrf
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input name="start_time" class="form-control floating datetimepicker dateFilRe1" type="text">
                        </div>
                        <label class="focus-label">Từ</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input name="end_time" class="form-control floating datetimepicker dateFilRe2" type="text">
                        </div>
                        <label class="focus-label">Đến</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <button type="submit" class="btn btn-success btn-block abc"> Tìm kiếm </button>  
                </div>     
            </div>
        </form>
        <!-- /Search Filter -->

        <!-- Chart -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Tổng doanh thu</h3>
                        <div id="bar-charts-report">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /Chart -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="frm-table-invocie" class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th>Khách hàng</th>
                                <th>Email</th>
                                <th>Ngày lập</th>
                                <th>Trạng thái</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody id="data-invoice-report-show">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

</div>
<!-- /Page Wrapper -->
@endsection

@push('chart-script')
<script src="{{ asset('backend/js/chartReport.js') }}"></script>
@endpush
