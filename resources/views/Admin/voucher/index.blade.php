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
                        <h3 class="page-title">Voucher</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Voucher</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_voucher"><i class="fa fa-plus"></i> Add Voucher</a>
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
                                    <th>Voucher Name </th>
                                    <th>Voucher Percentage (%) </th>
                                    <th>Amount</th>
                                    <th>Created Date </th>
                                    <th>Expired Date </th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
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
                                                        <i class="fa fa-dot-circle-o text-success"></i> Active
                                                    @else
                                                        <i class="fa fa-dot-circle-o text-danger"></i> Disable
                                                    @endif
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item btn-edit-voucher" href="#" data-id="{{ $voucher->id }}" data-toggle="modal" data-target="#edit_voucher"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item btn-delete-voucher" href="#" data-id="{{ $voucher->id }}" data-toggle="modal" data-target="#delete_voucher"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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