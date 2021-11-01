<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Type;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $sizes = Size::all();
        $types = Type::all();
        return View('Admin.products.index')->with(['products'=>$products,'sizes'=>$sizes,'types'=>$types]);
    }

    // public function showProduct($id){
    //     $products = Product::find($id);
    //     $productSize = ProductSize::with('sizes')->where('ProductID',$id)->get();
    //     // $sizes = $product->product_size->sizes;
    //     return response()->json(['products'=>$products,'size_products'=>$productSize]);
    // }

    // public function addProduct(Request $request){
    //     if(in_array(null, (array)$request->all(), true) || empty($request->size)){
    //         return response()->json(['error'=>'Vui lòng nhập đầy đủ thông tin!!']);
    //     }else{
    //         if((double)$request->price <= 0){
    //            return response()->json(['error'=>'Price không đúng định dạng!!']);
    //         }else if((int)$request->discount <= 0){
    //             return response()->json(['error'=>'Discount không đúng định dạng!!']);
    //         }else{
    //             if(!$request->hasFile('image_product')){
    //                 return response()->json(['error'=>'hãy chọn ảnh!!']);
    //             }else{
    //                 $image = $request->file('image_product');
    //                 $image->move(public_path('/backend/img/products'), $image->getClientOriginalName());
    //                 $product = Product::create([
    //                     'ProductName' => $request->name,
    //                     'Description'=>$request->description,
    //                     'Image' => $image->getClientOriginalName(),
    //                     'Price' => $request->price,
    //                     'Discount' => $request->discount,
    //                     'TypeID' => $request->Type
    //                 ]);
    
    //                 foreach($request->size as $size){
    //                     Product_Size::create([
    //                         'ProductID'=>$product->id,
    //                         'SizeID'=>$size
    //                     ]);
    //                 }
                    
    //                 return response()->json(['success'=>'Thêm thành công!!']);
    //             }
    //         }
    //     }
    // }

    // public function editProduct(Request $request,$id){
    //     if(in_array(null, (array)$request->all(), true) || empty($request->size)){
    //         return response()->json(['error'=>'Vui lòng nhập đầy đủ thông tin!!']);
    //     }else{
    //         if((double)$request->price <= 0){
    //            return response()->json(['error'=>'Price không đúng định dạng!!']);
    //         }else if((int)$request->discount <= 0){
    //             return response()->json(['error'=>'Discount không đúng định dạng!!']);
    //         }else{
    //             //change product
    //             if (!$request->hasFile('image_product')) {
    //                 $product = Product::where('ProductID',$id)->first();
    //                 // Nếu không thì in ra thông báo
    //                 $filename =  $product->Image;
    //             }else{
    //                 $image = $request->file('image_product');
    //                 $image->move(public_path('/backend/img/products'), $image->getClientOriginalName());
    //                 $filename = $image->getClientOriginalName();
    //             }
    //             $product = Product::where('ProductID',$id)->update([
    //                 'ProductName' => $request->name,
    //                 'Description'=>$request->description,
    //                 'Image' => $filename,
    //                 'Price' => $request->price,
    //                 'Discount' => $request->discount,
    //                 'TypeID' => $request->Type
    //             ]);

    //             //change size
    //             Product_Size::where('ProductID',$id)->delete();
    //             foreach($request->size as $size){
    //                 Product_Size::create([
    //                     'ProductID' => $id,
    //                     'SizeID' => $size
    //                 ]);
    //             }
    //             return response()->json(['success'=>'Sửa thành công!!']);
    //         }
    //     }
    // }

    // public function deleteProduct($id){
    //     Product::where('ProductID',$id)->delete();
    //     Product_Size::where('ProductID',$id)->delete();
    //     return response()->json(['ok'=>true]);
    // }

    // public function buttonOut($product){
    //     $str = '';
    //     foreach($product->product_size as $a){
    //         $str .= '<button>'.$a->sizes->Number.'</button> ';
    //     }
    //     return $str;
    // }

    // public function search(Request $request){
    //     if(empty($request->name) && empty($request->price)){
    //         $products = Product::join('product_sizes', 'products.ProductID', '=', 'product_sizes.ProductID')
    //         ->where('SizeID',$request->size[0])->get();
    //     }else{
    //         if(empty($request->name))
    //             $products = Product::where('Price',$request->price)->get();
    //         else if(empty($request->price))
    //             $products = Product::where('ProductName','like','%'.$request->name.'%')->get();
    //         else
    //             $products = Product::where('ProductName','like','%'.$request->name.'%')->where('Price',$request->price)->get();
    //     }
    //     //output
    //     $output = '';
    //     $count = 0;
    //     if(count($products) > 0){
    //         foreach($products as $product)
    //         {
    //             $count++;
    //             $output = $output.'<tr>
    //                 <td>'.$count.'</td>
    //                 <td>
    //                     <a href="profile.html" class="avatar"><img width="80" alt="" src="'.url('/backend/img/products/'.$product->Image).'"></a>
    //                 </td>
    //                 <td>'.$product->ProductName.'</td>
    //                 <td>'.$product->Price.'</td>
    //                 <td>'.$product->Discount.'</td>
    //                 <td>'.$this->buttonOut($product).'</td>
    //                 <td>'.$product->Type->TypeName.'</td>
    //                 <td class="text-right">
    //                     <div class="dropdown dropdown-action">
    //                         <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
    //                         <div class="dropdown-menu dropdown-menu-right">
    //                             <a class="dropdown-item btn-edit-product" href="#" data-id="'.$product->ProductID.'" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
    //                             <a class="dropdown-item btn-delete-product" data-id="'.$product->ProductID.'" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
    //                         </div>
    //                     </div>
    //                 </td>
    //             </tr>';
    //         }
    //     }else{
    //         return ['output'=>$output];
    //     }
    //     return ['output'=>$output];
    // }
}
