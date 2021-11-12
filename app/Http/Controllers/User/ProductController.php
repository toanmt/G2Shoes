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
use App\Models\Image;
use App\Models\Comment;

class ProductController extends Controller
{
	public function index($id){
		$data = Brand::all();
		$type = Type::all();
        $sizes = Size::all();
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
            ]
        );
	}

    public function addComment(Request $request){
        if ($request->author =='') {
            return response()->json(['errorN'=>'Full name cannot be left blank!']);
        }
        if ($request->content =='') {
            return response()->json(['errorN'=>'Details content cannot be left blank!']);
        }
        else {
            $comment= new Comment();
            $comment->author = $request->author;
            $comment->content = $request->content;
            $comment->product_id = $request->productId;
            $comment->save();
            return response()->json(['success'=>'Success!!']);
            // return response()->json(['author'=>$comment->author]);
        } 
    }
}
