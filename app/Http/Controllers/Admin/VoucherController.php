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
            if(!is_numeric($request->percent)){
                return response()->json(['errors'=>'phần trăm giảm không đúng định dạng']);
            }elseif((int)$request->percent < 0){
                return response()->json(['errors'=>'phần trăm giảm không được giá trị âm']);
            }elseif((int)$request->percent >50){
                return response()->json(['errors'=>'phần trăm giảm không được quá 50%']);
            }elseif(!is_numeric($request->amount)){
                return response()->json(['errors'=>'số lượng không đúng định dạng']);
            }elseif((int)$request->amount < 0){
                return response()->json(['errors'=>'số lượng không được giá trị âm']);
            }else{
                $voucher_name = Voucher::where('voucher_name',$request->voucher_name)->first();
                if(!isset($voucher_name)){
                    $voucher = new Voucher();
                    $voucher->voucher_name = $request->voucher_name;
                    $voucher->percent = $request->percent;
                    $voucher->amount = $request->amount;
                    $expired_date = implode("-", array_reverse(explode("/", $request->expired_date)));
                    if(time() <= strtotime($expired_date)){
                        $voucher->expired_date = $expired_date;
                    }else{
                        return response()->json(['errors'=>'Hạn sử dụng không đúng!!!']);
                    }
                    $voucher->status = $request->status;
                    $voucher->save();
                }else{
                    return response()->json(['errors'=>'Mã giảm giá đã tồn tại']);
                }
                
                return response()->json(['success'=>'Thêm thành công!!!']);
            }
        }
    }

    public function editVoucher(Request $request,$id){
        if(in_array(null, (array)$request->all(), true)){
            return response()->json(['errors'=>'vui lòng nhập đầy đủ thông tin']);
        }else{
            if(!is_numeric($request->percent)){
                return response()->json(['errors'=>'Phần trăm giảm không đúng định dạng']);
            }elseif((int)$request->percent < 0){
                return response()->json(['errors'=>'Phần trăm giảm không được giá trị âm']);
            }elseif((int)$request->percent >50){
                return response()->json(['errors'=>'Phần trăm giảm không được quá 50%']);
            }elseif(!is_numeric($request->amount)){
                return response()->json(['errors'=>'Phần trăm giảm không đúng định dạng']);
            }elseif((int)$request->amount < 0){
                return response()->json(['errors'=>'Phần trăm giảm không được giá trị âm']);
            }else{
                $voucher = Voucher::find($id);
                $voucher->voucher_name = $request->voucher_name;
                $voucher->percent = $request->percent;
                $voucher->amount = $request->amount;
                $expired_date = implode("-", array_reverse(explode("/", $request->expired_date)));
                if(strtotime($voucher->created_at) <= strtotime($expired_date)){
                    $voucher->expired_date = $expired_date;
                }else{
                    return response()->json(['errors'=>'Hạn sử dụng không đúng!!!']);
                }
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
