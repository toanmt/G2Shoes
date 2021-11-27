<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Brand;

class IntroduceController extends Controller
{
	public function index(){
		$session = session()->all();
		$data = Brand::all();
		return View('User.introduce.main')->with(['data'=>(object)$data, 'session' => $session]);
	}
}
