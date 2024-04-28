<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


use Illuminate\Http\Request;

class OrderController extends Controller
{   
    public function showMakeOrderPage(Request $request){
        $total = $request->total;
        return view('order.make-order',['total'=>$total]);
    }
    public function makeOrder(Request $request){
        $user = Auth::user();
        $order = $request->validate([
            'address'=>'required',
            'phone_number'=>'required',
            'note'=>'', 
        ]);
        $order['firstName'] = $user->firstName;
        $order['lastName'] = $user->lastName;
        $order['user_id'] = $user->id;

        $carts = $user->cart()->get();
        foreach($carts as $cart){
            $product = $cart->product;

            $order['product_id']=$product->id;
            Order::create($order);
            $product['available']=0;
            $product->update();
            $cart->delete();
        }
        return redirect('/all-products')->with('success','You have placed order succesfully!');
    }
}
