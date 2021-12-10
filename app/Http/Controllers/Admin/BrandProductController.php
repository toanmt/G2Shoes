<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Type;
use DB;

class BrandProductController extends Controller
{
    public function index(){
        $brands= Brand::all();
        $types =Type::all();
        return View('Admin.BrandProduct.index')->with(['brands'=>(object)$brands,'types'=>(object)$types]);
    }

    public function addBrand(Request $request){
        if ($request->brandName =='') {
            return response()->json(['errorN'=>'Tên thương hiệu không được để trống!']);
        }
        if(Brand::where("brand_name",$request->brandName)->first() != ''){
            return response()->json(['errorN'=>'Thương hiệu đã tồn tại!']);
        } else {
            $brand=new Brand();
            $brand->brand_name = $request->brandName;
            $brand->save();
            return response()->json(['success'=>'Success!!']);
        } 
    }

    public function deleteBrand($id){
        Brand::where('id',$id)->delete();
        Type::where('brand_id',$id)->delete();
        return response()->json(['ok'=>true]);
    }
    
    public function showBrand($id){
        $brand = Brand::where('id',$id)->first();
        return response()->json($brand);
    }

    public function editBrand(Request $request, $id){
        if ($request->brandName =='') {
            return response()->json(['errorN'=>'Tên thương hiệu không được để trống!']);
        }
        if(Brand::where("brand_name",$request->brandName)->first() != '' &&
                Brand::where('id',$id)->first()->brand_name != $request->brandName){
            return response()->json(['errorN'=>'Tên thương hiệu đã tồn tại!']);
        } else {
            Brand::where('id',$id)->update([
                'brand_name'=> $request->brandName
            ]);
            return response()->json(['success'=>'Success']);
        }
    }
}
