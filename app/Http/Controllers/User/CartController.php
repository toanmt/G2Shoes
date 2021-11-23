<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Size;

class CartController extends Controller
{
    public function addToCart($id, $size) {
        // session()->flush();
        $product = Product::find($id);
        $product_size = Size::find($size)->size_number;
        $cart = session()->get('cart');
        if (isset($cart["$id-$size"])) {
            $cart["$id-$size"]['quantity'] = $cart["$id-$size"]['quantity'] + 1;
        } else {
            $cart["$id-$size"] = [
                'id' => $id,
                'product_name' => $product->product_name,
                'product_size' => $product_size,
                'price' => $product->price,
                'discount' => $product->discount,
                'image' => $product->images,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success',
            'cart' => $cart,
        ], 200);
    }

    public function showCart() {
        $data = Brand::all();
        $session = session()->all();
        $carts = session()->get('cart');
        return View('User.cart.main')
        ->with(
            [
                'data' => (object)$data,
                'session'=> $session,
                'carts' => $carts,
            ]
        );
    }
}
