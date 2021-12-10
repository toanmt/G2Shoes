<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use DB;

class TypeController extends Controller
{
    public function addType(Request $request, $id){
        if ( DB::table('types')
            ->where('type_name', $request->typeName)
            ->where(['brand_id' => $id])->exists()) 
        {
            return response()->json(['errorN'=>'Loại sản phẩm này đã tồn tại!']);
        } else {
            $type = new Type();
            $type->type_name = $request->typeName;
            $type->brand_id = $id;
            $type->save();
            return response()->json(['success'=>'Success']);
        }
    }
    public function delType($id){
        Type::where('id',$id)->delete();
        return response()->json(['ok'=>true]);
    }
    
    public function editType(Request $request,$id){
        Type::where('id',$id)->update(['type_name'=>$request->get('typeName')]);
        return response()->json(['ok'=>true]);
    }
}