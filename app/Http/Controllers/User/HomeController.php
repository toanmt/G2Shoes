<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Brand;

class HomeController extends Controller
{
	public function index(){
		$data = Brand::all();
		return View('User.home.main')->with(['data'=>(object)$data]);
	}
}
