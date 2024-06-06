<?php

namespace App\Http\Controllers;

use App\Models\ContactMessages;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

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

    public function showStatisticPage()
    {
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
        return view('admin.statistic', [
            'dates' => $dates,
            'orderCounts' => $orderCounts,
            'counts' => $counts,
        ]);
    }


    public function showUsersPage(Request $request)

    {
        $query = User::query();
        if (isset($request->email))
            $query = $query->where('email', 'like', '%' . $request->email . '%');
        if (isset($request->username))
            $query = $query->where('username', 'like', '%' . $request->username . '%');

        $users = $query->get();
        $thirtyDaysAgo = Carbon::now()->subDays(30);

        $userDates = [];
        for ($i = 0; $i < 30; $i++) {
            $userDates[] = $thirtyDaysAgo->copy()->addDays($i)->format('Y-m-d');
        }

        $usersByDate = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $thirtyDaysAgo)
            ->groupBy('date')
            ->pluck('count', 'date');

        $userCounts = [];
        foreach ($userDates as $date) {
            $userCounts[] = $usersByDate[$date] ?? 0;
        }

        return view('admin.users', [
            'users' => $users,
            'userDates' => $userDates,
            'userCounts' => $userCounts
        ]);
    }

    public function showProductsPage(Request $request)
    {
        $query = Product::query();
        if (isset($request->name))
            $query = $query->where('name', 'like', '%' . $request->name . '%');
        if (isset($request->size))
            $query = $query->where('size', 'like', $request->size);
        $products = $query->get();
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
        return view('admin.products', [
            'products' => $products,
            'dates' => $dates,
            'counts' => $counts
        ]);
    }
    public function deleteProduct(Product $product)
    {
        $imagePath = public_path('uploads/' . $product->image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $product->delete();
        return redirect()->back()->with('success', 'You have successfully deleted product!');
    }
    public function showEditProductPage(Product $product)
    {
        return view('product.edit-product', ['product' => $product]);
    }
    public function editProduct(Product $product, Request $request)
    {
        if ($request->hasFile('image')) {
            $imagePath = public_path('uploads/' . $product->image);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $newImage = $request->file('image');
            $imageName = time() . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('uploads'), $imageName);;
            $product->image = $imageName;
        }

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->available = $request->input('available');
        $product->save();
        return redirect('/admin/products')->with('success', 'You have successfully edited product!');
    }
    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'You have successfully deleted user!');
    }
    public function showEditUserPage(User $user)
    {
        return view('admin.edit-user', ['user' => $user]);
    }
    public function updateUser(Request $request, User $user)
    {
        $user['username'] = $request->input('username');
        $user['firstName'] = $request->input('firstName');
        $user['lastName'] = $request->input('lastName');
        $user['email'] = $request->input('email');
        $user['admin'] = $request->input('admin');
        $user['contactBlock'] = $request->input('contactBlock');
        if (isset($request->productBlock)) {
            $user['productBlock'] = $request->input('productBlock');
        } else {
            $user['productBlock'] = false;
        }
        if (isset($request->orderBlock)) {
            $user['orderBlock'] = $request->input('orderBlock');
        } else {
            $user['orderBlock'] = false;
        }
        if (isset($request->admin)) {
            $user['admin'] = $request->input('admin');
        } else {
            $user['admin'] = false;
        }
        if (isset($request->contactBlock)) {
            $user['contactBlock'] = $request->input('contactBlock');
        } else {
            $user['contactBlock'] = false;
        }


        $user->update();
        return redirect('/admin/users')->with('success', 'You have successfully updated user!');
    }
    public function showOrdersPage(Request $request)
    {
        $query = Order::Query();
        if (isset($request->phone)) {
            $query = $query->where('phone_number', 'like', '%' . $request->phone . '%');
        }
        $orders = $query->get();
        $sevenDaysAgo = Carbon::now()->subDays(7);
        $dates = [];
        for ($i = 0; $i < 7; $i++) {
            $dates[] = $sevenDaysAgo->copy()->addDays($i)->format('Y-m-d');
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
        return view('admin.orders', [
            'orders' => $orders,
            'orderCounts' => $orderCounts
        ]);
    }

    public function deleteOrder(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'You have successfully deleted a order!');
    }
    public function showEditOrderPage(Order $order)
    {
        return view('admin.edit-order', ['order' => $order]);
    }

    public function updateOrder(Request $request, Order $order)
    {
        $request->validate([
            'address' => 'required|string',
            'phone' => 'required|string',
            'note' => 'nullable|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'accepted' => 'required|boolean',
            'delivered' => 'required|boolean',
        ]);

        $order->address = $request->input('address');
        $order->phone_number = $request->input('phone');
        $order->note = $request->input('note');
        $order->customer->firstName = $request->input('firstName');
        $order->customer->lastName = $request->input('lastName');
        $order->accepted = $request->input('accepted');
        $order->delivered = $request->input('delivered');

        $order->save();

        return redirect('/admin/orders')->with('success', 'Order updated successfully');
    }
    public function showMessagesPage(Request $request)
    {
        $query = ContactMessages::orderBy('read')->orderBy('created_at', 'asc');

        if (isset($request->title)) {
            $query = $query->where('title', 'like', '%' . $request->title . '%');
        }

        if (isset($request->username) || isset($request->email)) {
            $query = $query->whereHas('user', function ($q) use ($request) {
                if (isset($request->username)) {
                    $q->where('username', 'like', '%' . $request->username . '%');
                }
                if (isset($request->email)) {
                    $q->where('email', 'like', '%' . $request->email . '%');
                }
            });
        }

        $messages = $query->get();
        return view('admin.messages', ['messages' => $messages]);
    }

    public function showMessage(ContactMessages $message)
    {
        $message['read'] = true;
        $message->update();
        $replies = $message->replies()->with('user')->orderBy('created_at', 'desc')->get();
        foreach ($replies as $reply) {
            $reply['firstName'] = $reply->user->firstName;
            $reply['lastName'] = $reply->user->lastName;
        }

        return view('admin.message', [
            'message' => $message,
            'replies' => $replies
        ]);
    }
}
