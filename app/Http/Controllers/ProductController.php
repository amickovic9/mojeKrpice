<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function showAddProductPage()
    {
        return view('product.add-product');
    }
    public function addProduct(Request $request)
    {
        $product = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'size' => 'required',
            'contact' => 'required',
            'price' => 'required',
            'image' => '|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads'), $imageName);
            $product['image'] = $imageName;
        }
        $product['user_id'] = Auth::id();
        Product::create($product);
        return redirect('/')->with('success', 'You have succesfully posted your product!');
    }
    public function  showAllProducts()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('product.show-all-products', ['products' => $products]);
    }
}
