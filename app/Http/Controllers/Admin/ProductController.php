<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Type;
use App\Models\Image;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $sizes = Size::all();
        $types = Type::all();
        return View('Admin.products.index')->with(['products'=>$products,'sizes'=>$sizes,'types'=>$types]);
    }

    public function showProduct($id){
        $product = Product::with('type')->find($id);
        $image_product = Image::where('product_id',$id)->get();
        $product_size = ProductSize::where('product_id',$id)->with('sizes')->get();
        return response()->json(['product'=>$product,'product_size'=>$product_size,'image_product'=>$image_product]);
    }

    public function addProduct(Request $request){
        if(in_array(null, (array)$request->all(), true) 
        || in_array(null, (array)$request->size_amount, true)){
            return response()->json(['error'=>'Vui lòng nhập đầy đủ thông tin!!']);
        }else{
            if((double)$request->price <= 0){
               return response()->json(['error'=>'Price không đúng định dạng!!']);
            }else if((int)$request->discount <= 0){
                return response()->json(['error'=>'Discount không đúng định dạng!!']);
            }else if((int)$request->amount <= 0){
                return response()->json(['error'=>'Amount không đúng định dạng!!']);
            }else{
                if(!$request->hasFile('image_product')){
                    return response()->json(['error'=>'hãy chọn ảnh!!']);
                }else{
                    $image = $request->file('image_product');
                    
                    $product = new Product();
                    $product->product_name = $request->name;
                    $product->description = $request->description;
                    $product->price = $request->price;
                    $product->discount = $request->discount;
                    $product->amount = $request->amount;
                    $product->type_id = $request->type;
                    $product->save();

                    foreach($image as $img){
                        $img->move(public_path('/Image'), $img->getClientOriginalName());
                        $image_product = new Image();
                        $image_product->product_id = $product->id;
                        $image_product->image_name = $img->getClientOriginalName();
                        $image_product->save();
                    }
                    
                    if(isset($request->size)){
                        for($index = 0;$index < count($request->sizes) ; $index++){
                            $product_size = new ProductSize();
                            $product_size->product_id = $product->id;
                            $product_size->size_id = $request->sizes[$index];
                            $product_size->amount = $request->size_amount[$index];
                            $product_size->save();
                        }
                    }
                    
                    
                    return response()->json(['success'=>'Thêm thành công']);
                }
            }
        }
    }

    public function editProduct(Request $request,$id){
        
        if(in_array(null, (array)$request->all(), true) 
        || empty($request->sizes) || empty($request->size_amount)
        || in_array(null, (array)$request->sizes, true) 
        || in_array(null, (array)$request->size_amount, true)){
            return response()->json(['error'=>'Vui lòng nhập đầy đủ thông tin!!']);
        }else{
            if((double)$request->price <= 0){
               return response()->json(['error'=>'Price không đúng định dạng!!']);
            }else if((int)$request->discount <= 0){
                return response()->json(['error'=>'Discount không đúng định dạng!!']);
            }else if((int)$request->amount <= 0){
                return response()->json(['error'=>'Amount không đúng định dạng!!']);
            }else{
                //change product
                $product = Product::find($id);
                $product->product_name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->discount = $request->discount;
                $product->amount = $request->amount;
                $product->type_id = $request->type;
                $product->save();
                //xóa size cũ
                ProductSize::where('product_id',$id)->delete();
                //thêm size mới
                for($index = 0;$index < count($request->sizes) ; $index++){
                    $product_size = new ProductSize();
                    $product_size->product_id = $product->id;
                    $product_size->size_id = $request->sizes[$index];
                    $product_size->amount = $request->size_amount[$index];
                    $product_size->save();
                }
                
                if(!$request->hasFile('image_product')){
                    return response()->json(['success'=>'sửa thành công']);
                }else{
                    $image_products = Image::where('product_id',$id)->get();
                    $image = $request->file('image_product');
                    for($index = 0; $index < count($image_products); $index++){
                        $image[$index]->move(public_path('/Image'), $image[$index]->getClientOriginalName());
                        $image_products[$index]->image_name = $image[$index]->getClientOriginalName();
                        $image_products[$index]->save();
                    }
                }
                return response()->json(['success'=>'sửa thành công']);
            }
        }
    }

    public function deleteProduct($id){
        Product::where('id',$id)->delete();
        ProductSize::where('product_id',$id)->delete();
        Image::where('product_id',$id)->delete();
        return response()->json(['ok'=>true]);
    }

    public function sizeOut($product){
        $str = '';
    
        $product_sizes =  ProductSize::with('sizes')->where('product_id',$product->id)->get();
        foreach($product_sizes as $product_size){
            $str .= '<button>'.$product_size->sizes->size_number.'</button> ';
        }
        return $str;
        
    }

    public function imageOut($product){
        $str = '';
        $images = Image::where('product_id',$product->id)->get();
        foreach($images as $image){
            $str .= '<a><img width="80" alt="" src="'.url('/Image/'.$image->image_name).'"></a>';
        }
        return $str;
    }

    public function search(Request $request){
        if(empty($request->name) && empty($request->price)){
           $products = Product::join('product_sizes','product_sizes.product_id','=','products.id')->where('size_id',$request->size[0])->get();
        }else{
            if(empty($request->name))
                $products = Product::where('price',$request->price)->get();
            else if(empty($request->price))
                $products = Product::where('product_name','like','%'.$request->name.'%')->get();
            else
                $products = Product::where('product_name','like','%'.$request->name.'%')->where('price',$request->price)->get();
        }
        //output
        $output = '';
        $count = 0;
        if(count($products) > 0){
            foreach($products as $product)
            {
                $count++;
                $output = $output.'<tr>
                <td>'.$count.'</td>
                <td>'.$this->imageOut($product).'</td>
                <td>'.$product->product_name.'</td>
                <td>'.$product->price.'</td>
                <td>'.$product->discount.'</td>
                <td>'.$this->sizeOut($product).'</td>
                <td>'.$product->type->type_name.'</td>
                <td class="text-right">
                    <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item btn-edit-product" href="#" data-id="'.$product->id.'" data-toggle="modal" data-target="#edit_product"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item btn-delete-product" data-id="'.$product->id.'" href="#" data-toggle="modal" data-target="#delete_product"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>';
            }
        }else{
            return ['output'=>$output];
        }
        return ['output'=>$output];
    }

    
}
