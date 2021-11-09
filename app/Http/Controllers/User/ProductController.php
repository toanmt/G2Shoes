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

class ProductController extends Controller
{
	public function index($id){
        $data = Brand::all();
        $sizes = Size::all();
        $type = Type::all();
		$product = Product::with('type')->find($id);
        $image_product = Image::where('product_id',$id)->get();
        $product_size = ProductSize::where('product_id',$id)->with('sizes')->get();
        return View('User.productDetails.main')->with(['data'=>(object)$data,'product'=>(object)$product,'product_size'=>(object)$product_size,'sizes'=>(object)$sizes,'type'=>(object)$type,'image_product'=>(object)$image_product]);
	}
}
