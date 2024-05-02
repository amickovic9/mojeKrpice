<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;


use Illuminate\Http\Request;

class OrderController extends Controller
{   
    public function showMakeOrderPage(Request $request){
        if(Auth::user()->orderBlock == true){
            return redirect('/')->with('danger','You can not order products anymore!');

        }
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
            $product['available']=false;
            $product->update();
            $cart->delete();
        }
        return redirect('/all-products')->with('success','You have placed order succesfully!');
    }
    public function updateOrder(Request $request, Order $order){
        
        $order['delivered']=$request->input('delivered');
        if($order['delivered']){
            $order['accepted']=true;
        }
        else{
        $order['accepted']=$request->input('accepted');

        }
        if($order['accepted']==false){
            $product= Product::where('id',$order['product_id'])->first();
            $product['available']==true;
            $product->update();
        }
        $order->save();
        return redirect()->back();
    }
    public function showMyOrdersPage(){
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        return view('order.my-orders',['orders'=>$orders]);
    }
    public function showEditOrderPage(Order $order){
        if ($order->user_id != Auth::user()->id || $order->accepted !== null) {
            return redirect("/my-orders")->with('danger','You can edit only your orders!');
        }
        return view('order.edit-order',['order'=>$order]);
    }
    public function editOrder(Request $request){
        $order = Order::where('id',$request->input('id'))->first();

        if($order->user_id!=Auth::user()->id){
            return redirect("/my-orders")->with('danger','You can edit only your orders and orders that are not accepted!');
        }
        $order['firstName'] = $request->input('firstName');
        $order['lastName'] = $request->input('lastName');
        $order['phone_number'] = $request->input('phone_number');
        $order['address'] = $request->input('address');
        $order['note'] = $request->input('note');
        $order->update();
        return redirect("/my-orders")->with('success','You have successfully edited your order!');

    }
    public function deleteOrder(Order $order){
        if ($order->user_id != Auth::user()->id || $order->accepted !== null) {
            return redirect("/my-orders")->with('danger','You can delete only not accepted and your orders!');
        }
        $product=$order->product->first();
        $product['available']=true;
        $product->update();

        $order->delete();
        return redirect("/my-orders")->with('success','You have deleted your order!');
    }
}