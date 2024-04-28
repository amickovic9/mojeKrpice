<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;


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
    public function  showAllProducts(Request $request)
    {
        if (isset($request->sort)) {
            $sort = $request->sort;
            if ($sort == "price_asc") {
                $products = Product::where('available',1)->orderBy('price', 'asc')->get();
            }
            if ($sort == 'price_desc') {
                $products = Product::where('available',1)->orderBy('price', 'desc')->get();
            }
            if ($sort == 'date_asc') {
                $products = Product::where('available',1)->orderBy('created_at', 'asc')->get();
            }
            if ($sort == 'date_desc') {
                $products = Product::where('available',1)->orderBy('created_at', 'desc')->get();
            }
        } else {
            $products = Product::where('available',1)->get();
        }

        return view('product.show-all-products', ['products' => $products]);
    }
    public function showProduct(Product $product)
    {
        return view('product.product', ['product' => $product]);
    }
    public function showMyProductsPage(){
        $products =Auth::user()->products()->get();
        return view('product.my-products',['products'=>$products]);
    }


    public function deleteProduct(Product $product)
    {
        if($product->user_id != Auth::user()->id){
            return redirect('/my-products')->with('danger','You can delete only your products!');
        }
        $imagePath = public_path('uploads/' . $product->image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
    public function showEditProductPage(Product $product){
        if($product->user_id != Auth::user()->id){
            return redirect('/my-products')->with('danger','You can edit only your products!');
        }
        return view('product.edit-product',['product'=>$product]);
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

        return redirect('/my-products')->with('success', 'Product updated successfully.');
    }


}