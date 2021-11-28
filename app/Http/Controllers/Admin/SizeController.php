<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\ProductSize;
use DB;

class SizeController extends Controller
{
    public function addSize(Request $request){
        $output = '';
        if((double)$request->number_size > 0){
            $size = new Size();
            $size->size_number =$request->number_size;
            $size->save();
            return ['success'=>'oke'];
        }else{
            $output = 'Vui lòng nhập đúng định dạng';
            return ['error'=>$output];
        }
    }
    public function deleteSize(Request $request,$id){
        Size::where('id',$id)->delete();
        ProductSize::where('size_id',$id)->delete();
        return ['output'=>'xóa thành công'];
    }
}
