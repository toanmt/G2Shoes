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
                        <h3 class="page-title">Invoice</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <div class="btn-group btn-group-sm">
                            <button data-id="{{ $invoice->id }}" class="btn btn-white btn-pdf">PDF</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row" id="invoice-{{ $invoice->id }}">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h1 class="text-title">
                                    HÓA ĐƠN BÁN HÀNG
                                </h1><br>
                                <p><b>Địa chỉ:</b> Số 298 Đ. Cầu Diễn, Minh Khai, Bắc Từ Liêm, Hà Nội</p>
                                <p><b>Website:</b> bossgiay.com.vn -<b>Liên hệ:</b>01983337373</p>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
                                     <ul class="list-unstyled">
                                        <h3 class="text-uppercase">{{ $invoice->customer_name }}</h3>
                                        <li>SĐT: {{ $invoice->phone }}</li>
                                        <li>Address: {{ $invoice->address }}</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-lg-5 col-xl-4 m-b-20x text-right">
                                    <ul class="list-unstyled">
                                        <h3 class="text-uppercase">Invoice {{ $invoice->id }}</h3>
                                        <ul class="list-unstyled">
                                            <li>Date: <span>{{ $invoice->created_at->format('jS F Y') }}</span></li>
                                        </ul>
                                    </ul>
                                </div>
                                
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ITEM</th>
                                            <th>UNIT COST</th>
                                            <th>QUANTITY</th>
                                            <th class="text-right">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 0; $total = 0; ?>
                                        @foreach ($invoice->invoice_details as $item)
                                            <tr>
                                                <td><?php $count++; echo $count ?></td>
                                                <td>{{ $item->products->product_name }}</td>
                                                <td>{{ $item->products->price*(1-($item->products->discount)/100) }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td class="text-right">{{ $item->products->price*(1-($item->products->discount)/100)*$item->amount }}</td>
                                                <?php $total += $item->products->price*(1-($item->products->discount)/100)*$item->amount; ?>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <div class="row invoice-payment">
                                    <div class="col-sm-7">
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="m-b-20">
                                            <div class="table-responsive no-border">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th>Subtotal:</th>
                                                            <td class="text-right">{{ $total }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shipping Cost: </th>
                                                            <td class="text-right">{{ $invoice->shipping_cost }}</td>
                                                        </tr>
                                                        @if ($invoice->voucher)
                                                        <tr>
                                                            <th>Voucher (%): </th>
                                                            <td class="text-right">{{ $invoice->voucher->percent }}%</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <th>Total:</th>
                                                            @if ($invoice->voucher)
                                                                <td class="text-right text-primary"><h5>{{  $total*(1-($invoice->voucher->percent)/100)+$invoice->shipping_cost }}</h5></td>
                                                            @else
                                                                <td class="text-right text-primary"><h5>{{  $total+$invoice->shipping_cost }}</h5></td>
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        
    </div>
    <!-- /Page Wrapper -->
@endsection