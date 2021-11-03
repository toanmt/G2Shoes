<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Brand;
use App\Models\Type;
use App\Models\Product;

class HomeController extends Controller
{
	public function index(){
		$data = Brand::all();
		$type = Type::all()->take(3);
		return View('User.home.main')->with(['data'=>(object)$data])->with(['type'=>(object)$type]);
	}
}
