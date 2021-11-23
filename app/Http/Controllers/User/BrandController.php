<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Product;
use App\Models\ProductSize;

class BrandController extends Controller
{
	public function index($id){
		//Session
		$session = session()->all();

		$data = Brand::all();
		$brand = $data->find($id);
		$size = Size::all();
		$product = Product::select('products.id','product_name','price','discount','type_id', Product::raw('sum(price - price*discount/100) as currentprice'))
		->groupBy('products.id','product_name','price','discount','type_id')
		->join('types','types.id','=','products.type_id')
		->join('brands','types.brand_id','=','brands.id')
		->where('brands.id',$id);
		$product_size = ProductSize::join('sizes','sizes.id','=','product_sizes.size_id')->get();
		$sort_name = "Sắp xếp";

		//sort
		if(isset($_GET['sort_by'])) {
			$sort_by = $_GET['sort_by'];

			if($sort_by=='gia_giam') {
				$product = $product
				->orderBy('currentprice', 'DESC');
				$sort_name = "Giá: Giảm dần";
			} else if($sort_by=='gia_tang') {
				$product = $product
				->orderBy('currentprice', 'ASC');
				$sort_name = "Giá: Tăng dần";
			} else if($sort_by=='kytu_za') {
				$product = $product
				->orderBy('product_name', 'DESC');
				$sort_name = "Tên: Z-A";
			} else if($sort_by=='kytu_az') {
				$product
				->orderBy('product_name', 'ASC');
				$sort_name = "Tên: A-Z";
			}
		}
		
		$product = $product->get();

		return View('User.brand.main')
		->with(
			[
				'data'=>(object)$data,
				'brand'=>(object)$brand,
				'size'=>(object)$size,
				'product'=>(object)$product,
				'sort_name'=>(string)$sort_name,
				'product_size'=>(object)$product_size,
				'session' => $session,
			]
		);
	}

	public function filter($id) {
		$product = Product::select('products.id','product_name','price','discount','type_id')
		->join('types','types.id','=','products.type_id')
		->join('brands','types.brand_id','=','brands.id')
		->where('brands.id',$id)->with('images');


		// filter type
		if(isset($_GET['type_list'])) {
			$type_filter = explode(',', $_GET['type_list']);
			$product = $product
			->whereIn('types.id',$type_filter);
		}


		// filter size
		if(isset($_GET['size_list'])) {
			$size_filter = explode(',', $_GET['size_list']);
			$product = $product
			->join('product_sizes','product_sizes.product_id','=','products.id')
			->join('sizes','sizes.id','=','product_sizes.size_id')
			->whereIn('sizes.id',$size_filter);
		}

		// filter price
		if(isset($_GET['price_list'])) {
			switch ($_GET['price_list']) {
				case 1:
					$product = $product->whereBetween('price', [0, 1000000]);
					break;
				case 2:
					$product = $product->whereBetween('price', [1000000, 2000000]);
					break;
				case 3:
					$product = $product->whereBetween('price', [2000000, 3500000]);
					break;
				case 4:
					$product = $product->whereBetween('price', [3500000, 5000000]);
					break;
				case 5:
					$product = $product->where('price', '>' , 5000000);
					break;
			}
		}

		$product = $product->get();

		return response()->json($product);
	}
}
