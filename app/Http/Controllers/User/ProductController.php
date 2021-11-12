<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
		$data = Brand::all();
		$type = Type::all();
        $sizes = Size::all();
        $comment = Comment::where('product_id',$id)->get();
		$product = Product::with('type')->find($id);
		$product_size = ProductSize::where('product_id',$id)->with('sizes')->get();
		return View('User.productDetails.main')
        ->with(
            [
                'data'=>(object)$data,
                'type'=>(object)$type,
                'sizes'=>(object)$sizes,
                'product'=>(object)$product,
                'product_size'=>(object)$product_size,
                'comment'=>(object)$comment,
            ]
        );
	}

    
}
