<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Brand;
use App\Models\Product;
use App\Models\InvoiceDetail;

class HomeController extends Controller
{
	public function index(){
		//Session
		$session = session()->all();
		//sản phẩm mới
		$new_product = Product::orderBy('product_id','desc')->limit(4);

		//sản phẩm sale off
		$saleOff = Product::where('discount','>',0)->limit(4);


		//sản phẩm bán chạy
		$top_product = Product::selectRaw("products.* ,sum(invoice_details.amount) as Tong")
		->join('invoice_details','products.id','=','invoice_details.product_id')
		->groupBy("invoice_details.product_id")
		->orderBy("Tong","desc")
		->get();


		//sản phẩm đề cử
		$arr_key = [];
		for($i = 0;$i<4;$i++)
			array_push($arr_key,rand(1,10));

		$like_product = Product::whereIn('id',$arr_key)->get();

		$data = Brand::all();
		return View('User.home.main')->with(
			[
				'data' => (object)$data,
				'new_product' => $new_product,
				'sale_off' => $saleOff,
				'top_product' => $top_product,
				'session' => $session,
	]);
	}

	public function search(Request $request){
		$keywords = $request->keywords_submit;
		$search = Product::where('product_name','like','%'.$keywords.'%')->get();
		$data = Brand::all();
		return View('User.search.main')->with(['data'=>(object)$data])->with(['search'=>(object)$search])->with(['keywords'=>(string)$keywords]);
	}
}
