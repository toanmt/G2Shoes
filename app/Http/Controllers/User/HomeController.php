<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Image;
use App\Models\InvoiceDetail;

class HomeController extends Controller
{
	public function index(){
		//Session
		$session = session()->all();

		//sản phẩm mới
		$new_product = Product::orderBy('id','desc')->limit(4)->get();

		//sản phẩm sale off
		$saleOff = Product::where('discount','>',0)->limit(4)->get();

		//sản phẩm bán chạy
		$top_product = Product::selectRaw("products.* ,sum(invoice_details.amount) as Tong")
		->join('invoice_details','products.id','=','invoice_details.product_id')
		->groupBy("invoice_details.product_id")
		->orderBy("Tong","desc")
		->get();

		$data = Brand::all();
		$product_size = ProductSize::join('sizes','sizes.id','=','product_sizes.size_id')->get();
		return View('User.home.main')->with(
			[
				'data' => (object)$data,
				'new_product' => $new_product,
				'sale_off' => $saleOff,
				'top_product' => $top_product,
				'session' => $session,
        'product_size'=>(object)$product_size,
	]);
	}

	public function search(Request $request){
		$keywords = $request->keywords_submit;
		$search = Product::where('product_name','like','%'.$keywords.'%')->get();
		$data = Brand::all();
		return View('User.search.main')->with(['data'=>(object)$data])->with(['search'=>(object)$search])->with(['keywords'=>(string)$keywords]);
	}
	public function quickview(Request $request) {
		$product_id = $request->product_id;
		$url = $request->url;
		$product = Product::find($product_id);
		$product_size = ProductSize::where('product_id',$product_id)->join('sizes','sizes.id','=','product_sizes.size_id')->get();
		$product_image = Image::where('product_id', $product_id)->get();
		$output['product_name'] = $product->product_name;
		$output['product_id'] = $product->id;
		$output['product_price'] = $product->price;
		$output['product_discount'] = $product->discount;
		$output['product_size'] = $product_size;
		$output['product_sizes'] = '';
		$output['product_discount_display'] = '<span class="product-price__discount">- '.$product->discount.'%</span>';

		foreach ($product_size as $key => $size) {
			$output['product_sizes'] .= '
			<div class="select-size__list">
			<input id="size-'.$size->size_id.'" type="radio" name="product_size" value="'.$size->size_id.'" />
			<label class="size-item" for="size-'.$size->size_id.'">'.$size->size_number.'</label>
			</div>
			';
		}

		$output['product_dots'] = '';

		$count = 0;

		foreach ($product_image as $key => $image) {
			$output['product_dots'] .= '
			<div class="product-details-gallery__thumbs">
			<img
			class="slider-image"
			src="'.$url.'/Image/'.$image->image_name.'"
			alt="Product '.$image->id.'"
			data-index="'.$count.'"
			/>
			</div>
			';
			$count++;
		}

		$output['product_images'] = '';

		foreach ($product_image as $key => $image) {
			$output['product_images'] .= '
			<div class="slider-item quickview-slider">
			<img
			src="'.$url.'/Image/'.$image->image_name.'"
			alt="Product '.$image->id.'"
			/>
			</div>
			';
		}

		echo json_encode($output);
	}
}
