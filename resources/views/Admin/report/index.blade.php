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
                    <h3 class="page-title">Invoice Report</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/login') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Invoice Report</li>
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
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input name="end_time" class="form-control floating datetimepicker dateFilRe2" type="text">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <button type="submit" class="btn btn-success btn-block abc"> Search </button>  
                </div>     
            </div>
        </form>
        <!-- /Search Filter -->

        <!-- Chart -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Total Revenue</h3>
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
                                <th>Invoice Number</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
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
