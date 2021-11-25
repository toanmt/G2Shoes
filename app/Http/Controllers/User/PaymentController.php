<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Invoice;
use App\Models\Voucher;
use App\Models\InvoiceDetail;

class PaymentController extends Controller
{
	public function index(){
        $session = session()->all();
        $carts = session()->get('cart');
        return View('User.payment.main')
        ->with(
            [
                'session'=> $session,
                'carts' => $carts,
            ]
        );
	}

	public function clientUseVoucher(Request $request){
		//xóa session cũ
		if(($request->session()->get('voucher_id'))){
			$request->session()->forget('voucher_id');
		}
		
		$voucher = Voucher::where('voucher_name',$request->voucher)->where('status',0)->first();
		if(empty($voucher)){
			return response()->json(['error'=>'voucher không đúng']);
		}else{
			
			if($voucher){
				//giảm số lượng voucher
				$clientVoucher = Voucher::find($voucher->id);
				$clientVoucher->amount = $clientVoucher->amount - 1;
				$clientVoucher->save();
				//tạo session mới
				$request->session()->put('voucher_id', $voucher->id);
			}
			else{
				return response()->json(['error'=>'voucher không đúng']);
			}
		}
		return response()->json(['success'=>'voucher đã được cập nhật','voucher_percent'=>$voucher->percent]);
	}

	public function invoice_info(Request $request){
		//xóa session cũ
		if(($request->session()->get('invoice_info'))){
			$request->session()->forget('invoice_info');
		}
		//tạo session mới
		$request->session()->put('invoice_info', $request->all());
		
	}

	public function order(Request $request){
			$customer = $request->session()->get('invoice_info');

			$invoice = new Invoice();
			$invoice->customer_name = $customer['fullname'];
			$invoice->email = $customer['email'];
			$invoice->phone = $customer['phone'];
			$invoice->shipping_cost = 40000;
			$invoice->address = $customer['address'];
			if($request->session()->get('voucher_id')){
				$invoice->voucher_id = $request->session()->get('voucher_id');
			}else{
				$invoice->voucher_id = 0;
			}
			
			if($request->get('status') == 0){
				$invoice->status = 0;
				$invoice->save();
			}
			if($request->get('status') == 1){
				$invoice->status = 1;
				$invoice->save();
			}
			return response()->json(['message'=>'Đơn hàng đã được đặt']);
		
		
	}


}
