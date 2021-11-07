@extends('Admin.invoice.main')
@section('section')
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
                            <th>Shipping Cost</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody id="data-show">
                        @foreach ($invoices as $invoice)
                            <tr id="invoice-{{ $invoice->id }}">
                                <td><a href="invoice-view.html">{{ $invoice->id }}</a></td>
                                <td>{{ $invoice->customer_name }}</td>
                                <td>{{ $invoice->email }}</td>
                                <td>{{ $invoice->created_at->format('jS F Y') }}</td>
                                <td>{{ $invoice->shipping_cost }}</td>
                                <td>
                                    <div class="dropdown action-label">
                                    @if ($invoice->status == 0)
                                    <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-warning"></i> chờ</a>
                                    @elseif($invoice->status == 1)
                                    <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Hoàn thành</a>
                                    @else
                                    <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> Đã hủy</a>
                                    @endif
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item edit-status-invoice" status="0" data-id="{{ $invoice->id }}" href="#"><i class="fa fa-dot-circle-o text-warning"></i> chờ</a>
                                            <a class="dropdown-item edit-status-invoice" status="1" data-id="{{ $invoice->id }}"  href="#"><i class="fa fa-dot-circle-o text-success"></i> Hoàn thành</a>
                                            <a class="dropdown-item edit-status-invoice" status="2" data-id="{{ $invoice->id }}" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Đã hủy</a>
                                        </div>
                                    </div>  
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ url('admin/invoice-view/'.$invoice->id) }}"><i class="fa fa-eye m-r-5"></i> View</a>
                                            @if($invoice->status == 1)
                                                <a class="dropdown-item send-mail-invoice" data-id="{{ $invoice->id }}"><i class="fa fa-envelope  m-r-5"></i> Mail</a>
                                            @endif
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
@endsection