<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function index(){
        $vouchers = Voucher::all();
        return View('Admin.voucher.index')->with(['vouchers'=>$vouchers]);
    }

    public function showVoucher($id){
        $voucher = Voucher::find($id);
        return response()->json($voucher);
    }

    public function addVoucher(Request $request){
        if(in_array(null, (array)$request->all(), true)){
            return response()->json(['errors'=>'vui lòng nhập đầy đủ thông tin']);
        }else{
            if((int)$request->percent <= 0){
                return response()->json(['errors'=>'percent không đúng định dạng']);
            }else if((int)$request->amount <= 0){
                return response()->json(['errors'=>'amount không đúng định dạng']);
            }else{
                $voucher = new Voucher();
                $voucher->voucher_name = $request->voucher_name;
                $voucher->percent = $request->percent;
                $voucher->amount = $request->amount;
                $voucher->expired_date = implode("-", array_reverse(explode("/", $request->expired_date)));
                $voucher->status = $request->status;
                $voucher->save();
                return response()->json(['success'=>'Thêm thành công!!!']);
            }
        }
    }

    public function editVoucher(Request $request,$id){
        if(in_array(null, (array)$request->all(), true)){
            return response()->json(['errors'=>'vui lòng nhập đầy đủ thông tin']);
        }else{
            if((int)$request->percent <= 0){
                return response()->json(['errors'=>'percent không đúng định dạng']);
            }else if((int)$request->amount <= 0){
                return response()->json(['errors'=>'amount không đúng định dạng']);
            }else{
                $voucher = Voucher::find($id);
                $voucher->voucher_name = $request->voucher_name;
                $voucher->percent = $request->percent;
                $voucher->amount = $request->amount;
                $voucher->expired_date = implode("-", array_reverse(explode("/", $request->expired_date)));
                $voucher->status = $request->status;
                $voucher->save();
                return response()->json(['success'=>'Sửa thành công!!!']);
            }
        }
    }

    public function deleteVoucher($id){
        $voucher = Voucher::where('id',$id)->delete();
        return response()->json(['ok',true]);
    }
}
