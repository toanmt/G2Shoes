<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PaymentController extends Controller
{
	public function index(){
		return View('User.payment.main');
	}
}
