@extends('Admin.layout.main')

@section('title')
<title>Dashboard</title>
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
          <h3 class="page-title">Chào mừng đến trang Admin!</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    
    <h2>Hôm nay: {{$data_today->datenow}}</h2>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-lg-6">
        <div class="card dash-widget">
          <div class="card-body">
            <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
            <div class="dash-widget-info">
              <h3>{{$data_today->count}}</h3>
              <span>Đơn</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 ">
        <div class="card dash-widget">
          <div class="card-body">
            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
            <div class="dash-widget-info">
              <h3>{{number_format($data_today->sum)}} đ</h3>
              <span>Doanh thu</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h2> Thống kê trong tháng {{$data_today->monthnow}}</h2>
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Tổng doanh thu</h3>
        <div id="bar-charts"></div>
      </div>
    </div>
  </div>
  <!-- /Page Content -->
</div>


<!-- /Page Wrapper -->
@endsection

@push('chart-script')
  <script src="{{ asset('backend/js/chartHome.js') }}"></script>
@endpush
