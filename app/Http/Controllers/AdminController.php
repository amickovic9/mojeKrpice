<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdminPage()
    {
        $users = User::all();
        $products = Product::all();
        return view('admin.index', ['users' => $users, 'products' => $products]);
    }
}
