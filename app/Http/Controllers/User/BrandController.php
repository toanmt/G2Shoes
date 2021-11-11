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
		if(isset($_GET['sort_by'])) {
			$sort_by = $_GET['sort_by'];

			if($sort_by=='gia_giam') {
				$product = Product::select('products.id','product_name','price','discount','type_id')
				->join('types','types.id','=','products.type_id')
				->join('brands','types.brand_id','=','brands.id')
				->where('brands.id',$id)
				->orderBy('price', 'DESC')->get();
			} else if($sort_by=='gia_tang') {
				$product = Product::select('products.id','product_name','price','discount','type_id')
				->join('types','types.id','=','products.type_id')
				->join('brands','types.brand_id','=','brands.id')
				->where('brands.id',$id)
				->orderBy('price', 'ASC')->get();
			} else if($sort_by=='kytu_za') {
				$product = Product::select('products.id','product_name','price','discount','type_id')
				->join('types','types.id','=','products.type_id')
				->join('brands','types.brand_id','=','brands.id')
				->where('brands.id',$id)
				->orderBy('product_name', 'DESC')->get();
			} else if($sort_by=='kytu_az') {
				$product = Product::select('products.id','product_name','price','discount','type_id')
				->join('types','types.id','=','products.type_id')
				->join('brands','types.brand_id','=','brands.id')
				->where('brands.id',$id)
				->orderBy('product_name', 'ASC')->get();
			}
		}
		else {
			$product = Product::select('products.id','product_name','price','discount','type_id')
			->join('types','types.id','=','products.type_id')
			->join('brands','types.brand_id','=','brands.id')
			->where('brands.id',$id)->get();
		}


		return View('User.brand.main')->with(['data'=>(object)$data])->with(['brand'=>(object)$brand])
		->with(['size'=>(object)$size])->with(['product'=>(object)$product]);
	}
}
