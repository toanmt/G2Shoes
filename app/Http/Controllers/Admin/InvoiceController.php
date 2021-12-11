<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Voucher;
use Mail;

class InvoiceController extends Controller
{
    public function index(){
        $invoice = Invoice::all();
        return View('Admin.invoice.index')->with(['invoices'=>$invoice]);
    }

    public function showInvoice($id){
        $invoice = Invoice::find($id);
        if($invoice){
            
            if(!empty($invoice->voucher_id)){
                $voucher = Voucher::find($invoice->voucher_id);
                return View('Admin.invoice.detail')->with(['invoice'=>$invoice,'voucher'=>$voucher]);
            }else{
                return View('Admin.invoice.detail')->with(['invoice'=>$invoice]); 
            }
        }
        return View('Admin.invoice.detail')->with(['invoice'=>$invoice]);
    }

    public function changeStatus($invoice){
        if ($invoice->status == 0){
            return '<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-warning"></i> chờ</a>';
        }
        else if($invoice->status == 1){
            return '<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Hoàn thành</a>';
        }
        else{
           return '<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> Đã hủy</a>';
        }
    }

    public function editInvoice(Request $request,$id){
        $invoice = Invoice::find($id);
        if($invoice){
            $invoice->status = $request->get('status');
            $invoice->save();
        }

        $total = 0;
        foreach ($invoice->invoice_details as $item)
            $total += $item->products->price*(1-($item->products->discount)/100)*$item->amount;

        $output = '<tr id="invoice-'.$invoice->id.'">
            <td><a href="invoice-view.html">'.$invoice->id.'</a></td>
            <td>'.$invoice->customer_name.'</td>
            <td>'.$invoice->email.'</td>
            <td>'.$invoice->created_at->format('jS F Y').'</td>
            <td>'.$total.'</td>
            <td>
                <div class="dropdown action-label">'
                    .$this->changeStatus($invoice).'<div class="dropdown-menu">
                        <a class="dropdown-item edit-status-invoice" status="0" data-id="'.$invoice->id.'" href="#"><i class="fa fa-dot-circle-o text-warning"></i> chờ</a>
                        <a class="dropdown-item edit-status-invoice" status="1" data-id="'.$invoice->id.'"  href="#"><i class="fa fa-dot-circle-o text-success"></i> Hoàn thành</a>
                        <a class="dropdown-item edit-status-invoice" status="2" data-id="'.$invoice->id.'" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Đã hủy</a>
                    </div>
                </div>
            </td>
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
        return response()->json(['output'=>$output]);
    }

    public function searchInvoice(Request $request){
        $output = '';
        if(!empty($request->created_date)){
            $created_at = implode("-", array_reverse(explode("/", $request->created_date)));
            $invoices = Invoice::where('created_at','like','%'.$created_at.'%')->get();
        }else{
            if($request->status == ''){
                $invoices = Invoice::all();
            }else{
                $invoices = Invoice::where('status',(int)$request->status)->get();
            }
        }

        if(count($invoices) > 0){
            foreach($invoices as $invoice){
                $output .= '<tr id="invoice-'.$invoice->id.'">
                <td><a href="invoice-view.html">'.$invoice->id.'</a></td>
                <td>'.$invoice->customer_name.'</td>
                <td>'.$invoice->email.'</td>
                <td>'.$invoice->created_at->format('jS F Y').'</td>
                <td>'.$invoice->shipping_cost.'</td>
                <td>
                    <div class="dropdown action-label">'
                        .$this->changeStatus($invoice).'<div class="dropdown-menu">
                            <a class="dropdown-item edit-status-invoice" status="0" data-id="'.$invoice->id.'" href="#"><i class="fa fa-dot-circle-o text-warning"></i> chờ</a>
                            <a class="dropdown-item edit-status-invoice" status="1" data-id="'.$invoice->id.'"  href="#"><i class="fa fa-dot-circle-o text-success"></i> Hoàn thành</a>
                            <a class="dropdown-item edit-status-invoice" status="2" data-id="'.$invoice->id.'" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Đã hủy</a>
                        </div>
                    </div>
                </td>
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

            return response()->json(['output'=>$output]);
        }else{
            return response()->json(['output'=>'không tìm thấy thông tin này!!!']);
        }
    }

    public function sendInvoice(Request $request,$id){
        $invoice = Invoice::find($id);
        if($invoice){
            $to_name = 'admin';
            $to_email = $invoice->email;//to email
            if(!empty($invoice->voucher_id)){
                $voucher = Voucher::find($invoice->voucher_id);
                $data = ['invoice'=>$invoice,'voucher'=>$voucher];
            }else{
                $data = ['invoice'=>$invoice];
            }
        }
        Mail::send('Admin.emails.email-invoice', $data , function ($message) use ($to_email,$to_name) {
            $message->from('Nhom2pmmnm@gmail.com','Admin');
            $message->to($to_email,$to_name)->subject('Invoice');
        });
        if (Mail::failures()) {
            return response()->json(['error'=>'Sorry! Please try again latter']);
        }else{
            return response()->json(['success'=>'Great! Successfully send in your mail']);
        }
    }


}
