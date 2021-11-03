<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use DB;

class BrandProductController extends Controller
{
    public function index(){
        $brands= Brand::all();
        return View('admin.BrandProduct.index')->with(['brands'=>(object)$brands]);
    }

    public function addBrand(Request $request){
        if ($request->brandName =='') {
            return response()->json(['errorN'=>'Brand name cannot be left blank!']);
        }
        if(Brand::where("brand_name",$request->brandName)->first() != ''){
            return response()->json(['errorN'=>'Brand name already exists!']);
        } else {
            $brand=new Brand();
            $brand->brand_name = $request->brandName;
            $brand->save();
            return response()->json(['success'=>'Success!!']);
        } 
    }

    public function deleteBrand($id){
        Brand::where('id',$id)->delete();
        return response()->json(['ok'=>true]);
    }
    
    public function showBrand($id){
        $brand = Brand::where('id',$id)->first();
        return response()->json($brand);
    }

    public function editBrand(Request $request, $id){
        if ($request->brandName =='') {
            return response()->json(['errorN'=>'Brand name cannot be left blank!']);
        }
        if(Brand::where("brand_name",$request->brandName)->first() != '' &&
                Brand::where('id',$id)->first()->brand_name != $request->brandName){
            return response()->json(['errorN'=>'Brand name already exists!']);
        } else {
            Brand::where('id',$id)->update([
                'brand_name'=> $request->brandName
            ]);
            return response()->json(['success'=>'Success']);
        }
    }
}
