<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\InvoiceDetail;
use DB;

class HomeController extends Controller
{
    public function index(){
        $data_today = InvoiceDetail::join('products', 'invoice_details.product_id', '=', 'products.id')
        -> join('invoices', 'invoices.id', '=', 'invoice_details.invoice_id')
        ->select(DB::raw('
            DATE(NOW()) as datenow,
            SUM(invoice_details.amount * products.price + invoices.shipping_cost ) as sum,
            Count(invoices.id) as count'
        ))
        ->whereRaw("DATE(invoices.created_at) = DATE(NOW())")
        ->first();
        return View('Admin.home.index')
        ->with(['data_today'=> (object) $data_today]);
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