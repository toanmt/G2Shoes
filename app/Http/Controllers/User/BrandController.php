<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Brand;
use App\Models\Size;

class BrandController extends Controller
{
	public function index($id){
		$data = Brand::all();
		$brand = $data->where('id',$id);
		$size = Size::all();
		return View('User.brand.main')->with(['data'=>(object)$data])->with(['brand'=>(object)$brand])->with(['size'=>(object)$size]);
	}
}
