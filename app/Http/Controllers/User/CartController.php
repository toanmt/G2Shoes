<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;

class CartController extends Controller
{
    public function addToCart($id, $size, $quantity) {
        // session()->flush();
        $product = Product::find($id);
        $product_size = Size::find($size)->size_number;
        $cart = session()->get('cart');
        if (isset($cart["$id-$size"])) {
            $cart["$id-$size"]['quantity'] = $cart["$id-$size"]['quantity'] + $quantity;
            $cart["$id-$size"]['total_price'] = $cart["$id-$size"]['quantity'] * $cart["$id-$size"]['price'];
        } else {
            $cart["$id-$size"] = [
                'id' => $id,
                'size' => $size,
                'product_name' => $product->product_name,
                'product_size' => $product_size,
                'price' => $product->price,
                'total_price' => $product->price,
                'discount' => $product->discount,
                'image' => $product->images,
                'quantity' => $quantity,
            ];
        }
        session()->put('cart', $cart);
        $count = count($cart);
        return response()->json([
            'code' => 200,
            'message' => 'success',
            'cart' => $cart,
            'item' => $count,
        ], 200);
    }

    public function updateCart(Request $request) {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $discount = Product::find($cart[$request->id]['id'])->discount;
            $product_size = ProductSize::where('product_id',$cart[$request->id]['id'])
            ->where('product_sizes.size_id',$cart[$request->id]['size'])->first();
            if ($request->quantity > $product_size->amount) {
                return response()->json([
                    'code' => 400,
                    'message' => 'Không đủ hàng!',
                ], 200);
            }
            else if ($request->quantity <= $product_size->amount) {
                $cart[$request->id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
                $total_price = $cart[$request->id]['price'] - $cart[$request->id]['price'] * $discount/100;
                return response()->json([
                    'code' => 200,
                    'message' => 'success',
                    'total_price' => $total_price * $request->quantity,
                ], 200);
            }
        }
    }

    public function removeCart(Request $request) {
        if (isset($request->id)) {
            $cart = session()->get('cart');
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'cart' => $cart,
            ], 200);
        }
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
