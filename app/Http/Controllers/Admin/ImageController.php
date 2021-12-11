<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
class ImageController extends Controller
{
    public function index(Request $request){
        $search = $request->product_name;
        if(isset($search)){
            $images = Image::select('images.*')->rightJoin('products', 'products.id', '=', 'images.product_id')->where('product_name','like','%'.$search.'%')->paginate(12);
            $images->appends(['product_name' => $search]);
        }else{
            $images = Image::paginate(12);
        }
        
        return View('Admin.images.index')->with('images',$images);
    }

    public function showImage($id){
        $image = Image::find($id);
        return response()->json(['images'=>$image,'product_name'=>$image->products->product_name]);
    }

    public function editImage(Request $request,$id){
        //kiểm tra file đã upload chưa
        if(!$request->file('image_product')){
            //ko thay đổi csdl
            return response()->json(['success'=>'edit thành công']);
        }else{
            $image = Image::find($id);
            $image_upload = $request->file('image_product');
            //kiểm tra file có bị trùng ko
            if($image->image_name == $image_upload->getClientOriginalName()){
                return response()->json(['success'=>'edit thành công']);
            }else{
                //nếu không trùng thì upload mới vào folder Image
                $image_upload->move(public_path('/Image'), $image_upload->getClientOriginalName());
                //sửa lại database
                $image->image_name = $image_upload->getClientOriginalName();
                $image->save();
                return response()->json(['success'=>'edit thành công']);
            }
        }
    }

    public function deleteImage($id){
        $image = Image::find($id)->delete();
        if($image){
            return response()->json(['success'=>'xóa thành công']);
        }
    }

}
