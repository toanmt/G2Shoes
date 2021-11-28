<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Type;
use App\Models\Comment;

class ProductController extends Controller
{
	public function index($id){
        $session = session()->all();
		$data = Brand::all();
		$type = Type::all();
        $sizes = Size::all();
        $comment = Comment::where('product_id',$id)->orderBy('rating','DESC')->get();
        $product = Product::with('type')->find($id);
        //sản phẩm đề cử
        $arr_key = [];
        for($i = 0;$i<4;$i++)
            array_push($arr_key,rand(1,10));

        $like_product = Product::whereIn('id',$arr_key)->get();
		return View('User.productDetails.main')
        ->with(
            [
                'data'=>(object)$data,
                'type'=>(object)$type,
                'sizes'=>(object)$sizes,
                'product'=>(object)$product,
                'comment'=>(object)$comment,
                'session'=>$session,
                'like_product'=>(object)$like_product,
            ]
        );
	}
    
    
}
