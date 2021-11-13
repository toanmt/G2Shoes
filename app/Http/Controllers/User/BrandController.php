<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Product;
use App\Models\Image;
use DB;

class BrandController extends Controller
{
	public function index($id){
		$data = Brand::all();
		$brand = $data->find($id);
		$size = Size::all();
		$product = Product::select('products.id','product_name','price','discount','type_id')
		->join('types','types.id','=','products.type_id')
		->join('brands','types.brand_id','=','brands.id')
		->where('brands.id',$id)->get();
		$sort_name = "Sắp xếp";

		//sort
		if(isset($_GET['sort_by'])) {
			$sort_by = $_GET['sort_by'];

			if($sort_by=='gia_giam') {
				$product = Product::select('products.id','product_name','price','discount','type_id')
				->join('types','types.id','=','products.type_id')
				->join('brands','types.brand_id','=','brands.id')
				->where('brands.id',$id)
				->orderBy('price', 'DESC')->get();
				$sort_name = "Giá: Giảm dần";
			} else if($sort_by=='gia_tang') {
				$product = Product::select('products.id','product_name','price','discount','type_id')
				->join('types','types.id','=','products.type_id')
				->join('brands','types.brand_id','=','brands.id')
				->where('brands.id',$id)
				->orderBy('price', 'ASC')->get();
				$sort_name = "Giá: Tăng dần";
			} else if($sort_by=='kytu_za') {
				$product = Product::select('products.id','product_name','price','discount','type_id')
				->join('types','types.id','=','products.type_id')
				->join('brands','types.brand_id','=','brands.id')
				->where('brands.id',$id)
				->orderBy('product_name', 'DESC')->get();
				$sort_name = "Tên: Z-A";
			} else if($sort_by=='kytu_az') {
				$product = Product::select('products.id','product_name','price','discount','type_id')
				->join('types','types.id','=','products.type_id')
				->join('brands','types.brand_id','=','brands.id')
				->where('brands.id',$id)
				->orderBy('product_name', 'ASC')->get();
				$sort_name = "Tên: A-Z";
			}
		}

		//filter
		if(isset($_POST['action'])) {
			if(isset($_POST['size'])) {
				$size_filter = implode("','", $_POST['size']);
				$product = Product::select('products.id','product_name','price','discount','type_id')
				->join('types','types.id','=','products.type_id')
				->join('brands','types.brand_id','=','brands.id')
				->join('product_sizes','product_sizes.product_id','=','products.id')
				->join('sizes','product_sizes.size_id','=','sizes.id')
				->where('brands.id',$id)
				->whereIn('size_number',$size_filter)->get();
			}
		}

		return View('User.brand.main')
		->with(
			[
				'data'=>(object)$data,
				'brand'=>(object)$brand,
				'size'=>(object)$size,
				'product'=>(object)$product,
				'sort_name'=>(string)$sort_name
			]
		);
	}
}
