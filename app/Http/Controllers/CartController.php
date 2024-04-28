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
        $existingCart = Cart::where('user_id', $cart['user_id'])->where('product_id', $cart['product_id'])->first();
        if($existingCart){
            return redirect()->back()->with('danger','You have already added this item to cart!');
        }
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
            $product['cart']=$cartItem->id;
            $total += $product['price'];
        }


        return view('cart.my-cart', ['products' => $products, 'total' => $total]);
    }
    public function removeFromCart(Cart $cart){
        $cart->delete();
        return redirect()->back();
    }
}
