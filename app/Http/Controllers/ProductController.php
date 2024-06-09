<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class ProductController extends Controller
{
    public function showAddProductPage()
    {
        if (Auth::user()->productBlock == true) {
            return redirect('/all-products')->with('danger', 'Ne možete dodavati proizvode! Kontaktirajte naš tim za više informacija!');
        }
        return view('product.add-product');
    }
    public function addProduct(Request $request)
    {
        if (Auth::user()->productBlock == true) {
            return redirect('/')->with('danger', 'Ne možete dodavati proizvode! Kontaktirajte naš tim za više informacija!');
        }
        $product = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'size' => 'required',
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
        return redirect('/')->with('success', 'Uspešno ste dodali proizvod!');
    }
    public function showAllProducts(Request $request)
    {
        $productsQuery = Product::where('available', 1);

        if ($request->has('sort')) {
            $sort = $request->sort;
            if ($sort == "price_asc") {
                $productsQuery->orderBy('price', 'asc');
            } elseif ($sort == 'price_desc') {
                $productsQuery->orderBy('price', 'desc');
            } elseif ($sort == 'date_asc') {
                $productsQuery->orderBy('created_at', 'asc');
            } elseif ($sort == 'date_desc') {
                $productsQuery->orderBy('created_at', 'desc');
            }
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $productsQuery->where('name', 'like', '%' . $search . '%');
        }

        if ($request->filled('size')) {
            $size = $request->size;
            $productsQuery->where('size', 'like', '%' . $size . '%');
        }

        $products = $productsQuery->get();
        return view('product.show-all-products', ['products' => $products]);
    }





    public function showProduct(Product $product)
    {
        return view('product.product', ['product' => $product]);
    }
    public function showMyProductsPage()
    {
        $products = Auth::user()->products()->get();

        $ids = [];
        foreach ($products as $product) {
            $ids[] = $product->id;
        }

        $orders = Order::whereIn('product_id', $ids)
            ->where('delivered', 0)
            ->where('accepted',  true)
            ->orWhereNull('accepted')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('product.my-products', ['products' => $products, 'orders' => $orders]);
    }




    public function deleteProduct(Product $product)
    {
        if ($product->user_id != Auth::user()->id) {
            return redirect('/my-products')->with('danger', 'Možete brisati samo svoje proizvode!');
        }
        $imagePath = public_path('uploads/' . $product->image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Proizvod uspešno obrisan!');
    }
    public function showEditProductPage(Product $product)
    {
        if ($product->user_id != Auth::user()->id) {
            return redirect('/my-products')->with('danger', 'Možete menjati samo svoje proizvode!');
        }
        return view('product.edit-product', ['product' => $product]);
    }
    public function updateProduct(Request $request, Product $product)
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

        return redirect('/my-products')->with('success', 'Proizvod uspešno izmenjen!');
    }
}
