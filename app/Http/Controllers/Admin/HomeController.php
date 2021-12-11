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
        -> leftjoin('vouchers', 'invoices.voucher_id', '=', 'vouchers.id')
        ->select(DB::raw('
            DATE(NOW()) as datenow,
            IFNULL(SUM(invoice_details.amount * products.price *(100 - vouchers.percent )/ 100 + invoices.shipping_cost ),SUM(invoice_details.amount * products.price  + invoices.shipping_cost )) as sum,
            Count(invoices.id) as count'))
        ->whereRaw("DATE(invoices.created_at) = DATE(NOW())")
        ->first();
        if ($data_today->sum == null) {
            $data_today->sum = 0;
        }
        return View('Admin.home.index')
        ->with(['data_today'=> (object) $data_today]);
    }
    public function chartMonth()
    {
        $data_Month = InvoiceDetail::join('products', 'invoice_details.product_id', '=', 'products.id')
        -> join('invoices', 'invoices.id', '=', 'invoice_details.invoice_id')
        -> leftjoin('vouchers', 'invoices.voucher_id', '=', 'vouchers.id')
        ->select(DB::raw(
            "Day(invoices.created_at) as 'day',
            IFNULL(SUM(invoice_details.amount * products.price *(100 - vouchers.percent )/ 100 + invoices.shipping_cost ),SUM(invoice_details.amount * products.price  + invoices.shipping_cost )) as sum"
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