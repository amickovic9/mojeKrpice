<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{



    public function showAdminPage()
    {
   
    $users = User::all();
    $products = Product::all();
    
    return view('admin.index', [
        'users' => $users,
        'products' => $products,
    ]);
    }

    public function showStatisticPage(){
        $sevenDaysAgo = Carbon::now()->subDays(7);
        $dates = [];
        for ($i = 0; $i < 7; $i++) {
            $dates[] = $sevenDaysAgo->copy()->addDays($i)->format('Y-m-d');
        }
    
        $productsByDate = Product::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $sevenDaysAgo)
            ->groupBy('date')
            ->pluck('count', 'date');
    
        $counts = [];
        foreach ($dates as $date) {
            $counts[] = $productsByDate[$date] ?? 0;
        }
        
    $acceptedFalseOrders = Order::where('created_at', '>=', $sevenDaysAgo)
        ->where('accepted', true)
        ->where('delivered', false)
        ->count();

    $acceptedNullOrders = Order::where('created_at', '>=', $sevenDaysAgo)
        ->whereNull('accepted')
        ->count();
    
    $deliveredOrders = Order::where('created_at', '>=', $sevenDaysAgo)
        ->where('delivered', true)
        ->count();
    $declinedOrders = Order::where('created_at', '>=', $sevenDaysAgo)
    ->where('accepted', false)
    ->count();
        $orderCounts = [
            'Declined orders' => $declinedOrders,
            'Accepted Orders' => $acceptedFalseOrders,
            'Processing Orders' => $acceptedNullOrders,
            'Delivered Orders' => $deliveredOrders,
        ];
        return view('admin.statistic',[
            'dates' => $dates,
            'orderCounts'=>$orderCounts,
            'counts' =>$counts,
        ]);
   
    }

    public function showUsersPage(){
        $users = User::all();
        return view('admin.users',['users'=>$users]);
    }
    public function showProductsPage(){
        $products = Product::all();
        return view('admin.products',['products'=>$products]);
    }
}
   

