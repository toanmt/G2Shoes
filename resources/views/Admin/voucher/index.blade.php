@extends('Admin.layout.main')

@section('title')
<title>Mã giảm giá</title>
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
                        <h3 class="page-title">Mã giảm giá</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/login') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Mã giảm giá</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_voucher"><i class="fa fa-plus"></i> Thêm mã giảm giá</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="voucher-table" class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên mã giảm giá</th>
                                    <th>Phần trăm giảm (%) </th>
                                    <th>Số lượng</th>
                                    <th>Ngày lập </th>
                                    <th>Ngày kết thúc </th>
                                    <th>Trạng thái</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 0; ?>
                                @foreach ($vouchers as $voucher)
                                    <tr>
                                        <td><?php $count++; echo $count; ?></td>
                                        <td>{{ $voucher->voucher_name}}</td>
                                        <td>{{ $voucher->percent }}</td>
                                        <td>{{ $voucher->amount }}</td>
                                        <td>{{ $voucher->created_at->format('d/m/Y') }}</td>
                                        <td>{{ date('d/m/Y',strtotime($voucher->expired_date)) }}</td>
                                        <td>
                                            <div class="action-label">
                                                <a class="btn btn-white btn-sm btn-rounded" href="#">
                                                    @if($voucher->status == 0)
                                                        <i class="fa fa-dot-circle-o text-success"></i> Kích hoạt
                                                    @else
                                                        <i class="fa fa-dot-circle-o text-danger"></i> Khóa
                                                    @endif
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item btn-edit-voucher" href="#" data-id="{{ $voucher->id }}" data-toggle="modal" data-target="#edit_voucher"><i class="fa fa-pencil m-r-5"></i> Sửa</a>
                                                    <a class="dropdown-item btn-delete-voucher" href="#" data-id="{{ $voucher->id }}" data-toggle="modal" data-target="#delete_voucher"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
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
        
        @include('Admin.voucher.add_voucher')
        @include('Admin.voucher.edit_voucher')
        @include('Admin.voucher.del_voucher')
    </div>
    <!-- /Page Wrapper -->
@endsection