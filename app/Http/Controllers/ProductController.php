<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductAttr;
use App\Models\Size;
use App\Models\SelectedColor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        $products = Product::with('category')->get();
        // dd($products);
        $title = "Products";
        return view('admin.product.products',get_defined_vars());
    }
    public function show_add_product_page(){
        $categories = Category::all();
        // dd($categories);
        $title = "Add product";
        return view('admin.product.add_product',get_defined_vars());
    }
    public function add_product(Request $request){
        // dd('here');
        $request->validate([
            "category_id" => 'required',
            "name" => 'required',
            "image" => 'required',
            "short_desc" => 'required',
            "desc" => 'required',
            "price" => 'required',
            'in_stock' => 'min:1'
        ]);
        // dd($request->all());
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $imageName = time() . '.' . $request->image->extension();
        $path =  $request->image->move(public_path('assets/admin/product_images'), $imageName);
        $product->image = $imageName;
        $product->short_desc = $request->short_desc;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->in_stock = $request->in_stock;
        if($request->status == 'on'){
            $product->status = 'Active';
        }
        else{
            $product->status = 'Not Active';
        }
        $product->save();
        return redirect('products')->with('success', 'New product added successfully');
    }
    public function delete($id){
        Product::find($id)->delete();
        return redirect()->back()->with('success', 'The product deleted successfully');
    }
    public function edit($id){
        $title = "Edit product";
        $product = Product::find($id);
        // dd($product);
        $categories = Category::all();
        $url = '/update_product' . '/' . $id;
        // dd($product);
        return view('admin.product.edit_product',get_defined_vars());
    }
    public function update($id, Request $request){
        $request->validate([
            'in_stock' => 'min:1'
        ]);
        $product = Product::find($id);
        // dd($product);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        if($request->image){
            // dd('image');
            $imageName = time() . '.' . $request->image->extension();
            $path =  $request->image->move(public_path('assets/admin/product_images'), $imageName);
            $product->image = $imageName;
        }
        $product->short_desc = $request->short_desc;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->in_stock = $request->in_stock;
        if($request->status == 'on'){
            $product->status = 'Active';
        }
        else{
            $product->status = 'Not Active';
        }
        // dd($request->all());
        $product->save();
        return redirect('products')->with('success', 'The product updated successfully');
    }
}
