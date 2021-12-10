<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;

class ImageController extends Controller
{
    public function index(){
        $images = Image::paginate(12);
        $products = Product::all();
        return View('Admin.images.index')->with(['images'=>$images,'products'=>$products]);
    }

    public function showImage($id){
        $image = Image::find($id);
        return response()->json(['images'=>$image,'product_name'=>$image->products->product_name]);
    }

    public function editImage(Request $request,$id){
        //kiểm tra file đã upload chưa
        if(!$request->file('image_product')){
            //ko thay đổi csdl
            return response()->json(['success'=>'Sửa thành công']);
        }else{
            $image = Image::find($id);
            $image_upload = $request->file('image_product');
            //kiểm tra file có bị trùng ko
            if($image->image_name == $image_upload->getClientOriginalName()){
                return response()->json(['success'=>'Sửa thành công']);
            }else{
                //nếu không trùng thì upload mới vào folder Image
                $image_upload->move(public_path('/Image'), $image_upload->getClientOriginalName());
                //sửa lại database
                $image->image_name = $image_upload->getClientOriginalName();
                $image->save();
                return response()->json(['success'=>'Sửa thành công']);
            }
        }
    }

    public function deleteImage(Request $request,$id){
        $image = Image::find($id)->delete();
        if($image){
            return response()->json(['success'=>'Xóa thành công']);
        }
    }

    public function searchImage(Request $request){
        $output = '';

        $products = Product::where('product_name','like','%'.$request->product_name.'%')->with('images')->get();

        if(count($products)> 0){
            foreach($products as $product){
                foreach($product->images as $image){
                    $output .= '<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="text-center">
                                <a><img width="100" height="100" src="'.url('/Image/'.$image->image_name).'" alt=""></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item btn-edit-image" data-id="'.$image->id.'" href="#" data-toggle="modal" data-target="#edit_image"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item btn-delete-image" data-id="'.$image->id.'" href="#" data-toggle="modal" data-target="#delete_image"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <div class="small text-muted justify-content-center">'.$image->products->product_name.'</div>
                        </div>
                    </div>';
                }
            }
            return response()->json(['output'=>$output]);
        }else{
            return response()->json(['output'=>$output]);
        }
        
    }
}
