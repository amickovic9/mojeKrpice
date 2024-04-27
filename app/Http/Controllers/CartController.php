<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        $cart['user_id'] = Auth::user()->id;
        $cart['product_id'] = $product->id;
        Cart::create($cart);
        return redirect()->back()->with('success', 'Succesfully added to cart');
    }
    public function showMyCart()
    {
        $user = Auth::user();
        $cartItems = $user->cart()->get();
        $products = collect();
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $product = $cartItem->product;
            $products->push($product);
            $total += $product['price'];
        }


        return view('cart.my-cart', ['products' => $products, 'total' => $total]);
    }
}
