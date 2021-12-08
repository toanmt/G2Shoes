<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Voucher;
use App\Models\InvoiceDetail;
use DB;

class HomeController extends Controller
{
    public function index(){
        $data_today = InvoiceDetail::join('products', 'invoice_details.product_id', '=', 'products.id')
        -> join('invoices', 'invoices.id', '=', 'invoice_details.invoice_id')
        ->select(DB::raw('
         invoice_details.amount as amount,
         products.price as price,
         products.discount as discount,
         invoices.shipping_cost as ship,
         invoices.voucher_id as voucher'
     ))
        ->whereRaw("DATE(invoices.created_at) = DATE(NOW())")
        ->get();
        $count=0;
        $sum=0;
        foreach ($data_today as $data) {
            if(!empty($data->voucher)){
                $voucher = Voucher::find($data->voucher);
                $sum += $data->amount *$data->price*(100-$data->discount)/100 *(100-$voucher->percent)/100 +$data->ship;
            }
            else{
                $sum += $data->amount *$data->price +$data->ship;
            }
            $count++;
        }
        return View('Admin.home.index')
        ->with(['count'=> (string) $count,'sum'=>(string) $sum]);
    }
    public function chartMonth()
    {
        $data_Month = InvoiceDetail::join('products', 'invoice_details.product_id', '=', 'products.id')
        -> join('invoices', 'invoices.id', '=', 'invoice_details.invoice_id')
        ->select(DB::raw(
            "Day(invoices.created_at) as 'day',
            SUM(invoice_details.amount * products.price + invoices.shipping_cost ) as sum"
        ))
        ->whereRaw("Month(invoices.created_at) = Month(NOW()) and
            Year(invoices.created_at) = Year(NOW()) and 
            invoices.status = 1")
        ->groupBy(DB::raw('day'))
        ->get();

        foreach ($data_Month as $value) {
            $chart_data[] = array(
                'day' => $value->day,
                'Total' => $value->sum
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function changePass (Request $request){
        return View('Admin.home.changePassword');
    }
}