<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Product;

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
				'session' => $session,
			]
		);
	}

	public function filter(Request $request, $id) {
		$product = Product::select('products.id','product_name','price','discount','type_id')
		->join('types','types.id','=','products.type_id')
		->join('brands','types.brand_id','=','brands.id')
		->join('product_sizes','product_sizes.product_id','=','products.id')
		->join('sizes','sizes.id','=','product_sizes.size_id')
		->where('brands.id',$id)
		->with('images')
		->with('product_size');


		// filter type
		if($request->type_list) {
			$type_filter = explode(',', $request->type_list);
			$product = $product
			->whereIn('types.id',$type_filter);
		}


		// filter size
		if($request->size_list) {
			$size_filter = explode(',', $request->size_list);
			$product = $product
			->whereIn('sizes.id',$size_filter);
		}

		// filter price
		if($request->price_list) {
			switch ($request->price_list) {
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
		$arr = array();
		$i = 0;
		foreach($product as $key => $value) {
			if(!in_array($value, $arr)) {
				$arr[$i] = $product[$key];
				$i++;
			}
		}

		echo json_encode($arr, true);
	}
}
