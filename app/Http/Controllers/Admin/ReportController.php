<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\InvoiceDetail;
use DB;

class ReportController extends Controller
{
    public function index(){
        return View('Admin.report.index');
    }
    public function filter(Request $request){
        return response()->json(['data.chart'=>$request->dateReport1]);
    }
}