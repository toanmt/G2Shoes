<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\InvoiceDetail;
use Carbon\Carbon;
use DB;

class ReportController extends Controller
{
    public function index(){
        return View('Admin.report.index');
    }

    public function data30day (){
        $d30ago = Carbon::now()->subDays(30);

        //Tổng hóa đơn trong 30 ngày trở lại đây
        $data_chart_Month = InvoiceDetail::join('products', 'invoice_details.product_id', '=', 'products.id')
        -> join('invoices', 'invoices.id', '=', 'invoice_details.invoice_id')
        ->select(DB::raw(
            "Day(invoices.created_at) as 'day',
            SUM(invoice_details.amount * products.price + invoices.shipping_cost ) as sum"
        ))
        ->whereRaw("Month(invoices.created_at) = Month(NOW()) and
            Year(invoices.created_at) = Year(NOW())and 
            invoices.status = 1")
        ->groupBy(DB::raw('day'))
        ->get();

        foreach ($data_chart_Month as $value) {
            $chart_data[] = array(
                'day' => $value->day,
                'Total' => $value->sum
            );
        }

        //Xuât danh sách tất cả các hóa đơn trong 30 ngày trở lại đây
        $output = '';
        $invoices = Invoice::whereBetween('invoices.created_at',[$d30ago,now()])->get();

        if(count($invoices) > 0){
            foreach($invoices as $invoice){
                $status ='';
                if ($invoice->status == 0){
                    $status = '<div class="btn btn-white btn-sm btn-rounded" ><i class="fa fa-dot-circle-o text-warning"></i> chờ</div>';
                }
                else if($invoice->status == 1){
                    $status = '<div class="btn btn-white btn-sm btn-rounded" ><i class="fa fa-dot-circle-o text-success"></i> Hoàn thành</div>';
                }
                else{
                   $status = '<div class="btn btn-white btn-sm btn-rounded" ><i class="fa fa-dot-circle-o text-danger"></i> Đã hủy</div>';
               }
               $output .= '<tr id="invoice-'.$invoice->id.'">
               <td>'.$invoice->id.'</td>
               <td>'.$invoice->customer_name.'</td>
               <td>'.$invoice->email.'</td>
               <td>'.$invoice->created_at->format('jS F Y').'</td>
               <td>'.$status.'</td>
               <td class="text-right">
               <div class="dropdown dropdown-action">
               <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
               <div class="dropdown-menu dropdown-menu-right">
               <a class="dropdown-item" href="'.url('admin/invoice-view/'.$invoice->id).'"><i class="fa fa-eye m-r-5"></i> View</a>
               '.($invoice->status == 1 ? '<a class="dropdown-item send-email-invoice" data-id="'.$invoice->id.'"><i class="fa fa-envelope  m-r-5"></i> Mail</a>':'').'
               </div>
               </div>
               </td>
               </tr>';
           }
       }
       return response()->json(['chart'=>$chart_data,'listinvoice'=>$output]);  
   }
   public function filter(Request $request)
   {
    $start  = implode("-", array_reverse(explode("/", $request->start_time)));
    $end    = implode("-", array_reverse(explode("/", $request->end_time)));

        //Tổng hóa đơn 
    $data_chart_Month = InvoiceDetail::join('products', 'invoice_details.product_id', '=', 'products.id')
    -> join('invoices', 'invoices.id', '=', 'invoice_details.invoice_id')
    -> join('vouchers', 'invoices.voucher_id', '=', 'vouchers.id')
    ->select(DB::raw(
        "invoices.created_at, Day(invoices.created_at) as 'day',
        SUM(invoice_details.amount * products.price *(100 - vouchers.percent )/ 100 
        + invoices.shipping_cost ) as sum"
    ))
    ->whereRaw('invoices.created_at Between "' .$start.'" and "'.$end . '" and invoices.status = 1')
    ->groupBy(DB::raw('day,invoices.created_at'))
    ->get();

    foreach ($data_chart_Month as $value) {
        $chart_data[] = array(
            'day' => $value->day,
            'Total' => $value->sum
        );
    }

        //Xuât danh sách tất cả các hóa đơn 
    $output = '';
    $invoices = Invoice::whereBetween('invoices.created_at',[$start,$end])
    ->get();

    if(count($invoices) > 0){
        foreach($invoices as $invoice){
            $status ='';
            if ($invoice->status == 0)
            {
                $status = '<div class="btn btn-white btn-sm btn-rounded" ><i class="fa fa-dot-circle-o text-warning"></i> chờ</div>';
            }
            else if($invoice->status == 1)
            {
                $status = '<div class="btn btn-white btn-sm btn-rounded" ><i class="fa fa-dot-circle-o text-success"></i> Hoàn thành</div>';
            }
            else
            {
               $status = '<div class="btn btn-white btn-sm btn-rounded" ><i class="fa fa-dot-circle-o text-danger"></i> Đã hủy</div>';
           }
           $output .= '<tr id="invoice-'.$invoice->id.'">
           <td>'.$invoice->id.'</td>
           <td>'.$invoice->customer_name.'</td>
           <td>'.$invoice->email.'</td>
           <td>'.$invoice->created_at->format('jS F Y').'</td>
           <td>'.$status.'</td>
           <td class="text-right">
           <div class="dropdown dropdown-action">
           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
           <div class="dropdown-menu dropdown-menu-right">
           <a class="dropdown-item" href="'.url('admin/invoice-view/'.$invoice->id).'"><i class="fa fa-eye m-r-5"></i> View</a>
           '.($invoice->status == 1 ? '<a class="dropdown-item send-email-invoice" data-id="'.$invoice->id.'"><i class="fa fa-envelope  m-r-5"></i> Mail</a>':'').'
           </div>
           </div>
           </td>
           </tr>';
       }
   }
   return response()->json(['chart'=>$chart_data,'listinvoice'=>$output]);
}
}