<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Type;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $sizes = Size::all();
        $types = Type::all();
        return View('Admin.products.index')->with(['products'=>$products,'sizes'=>$sizes,'types'=>$types]);
    }

    
}
