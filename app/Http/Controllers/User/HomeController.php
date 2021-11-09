<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Brand;
use App\Models\Product;

class HomeController extends Controller
{
	public function index(){
		$data = Brand::all();
		return View('User.home.main')->with(['data'=>(object)$data]);
	}
	public function search(Request $request){
		$keywords = $request->keywords_submit;
		$search = Product::where('product_name','like','%'.$keywords.'%')->get();
		$data = Brand::all();
		return View('User.search.main')->with(['data'=>(object)$data])->with(['search'=>(object)$search])->with(['keywords'=>(string)$keywords]);
	}
}
