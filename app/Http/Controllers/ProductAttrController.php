<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductAttr;
use Illuminate\Http\Request;

class ProductAttrController extends Controller
{
    public function productAttr(){
        // $products = ProductAttr::with('category')->has('category')->get();
        $products = ProductAttr::all();
        // dd($products);
        $title = "Products";
        return view('admin.product_attr.products',get_defined_vars());
    }
    public function show_add_product_page(){
        $categories = Category::all();
        // dd($categories);
        $title = "Add product";
        return view('admin.product_attr.add_product',get_defined_vars());
    }
    public function add_product(Request $request){
        $request->validate([
            "products_id" => 'required',
            "sku" => 'required',
            "slug" => 'required',
            "image" => 'required',
            "mrp" => 'required',
            "price" => 'required',
            "qty" => 'required',
            "size_id" => 'required',
            "color_id" => 'required',
        ]);
        // dd($request->all());
        $product = new ProductAttr();
        $product->products_id = $request->products_id;
        $product->sku = $request->sku;
        $product->slug = $request->slug;
        $imageName = time() . '.' . $request->image->extension();
        $path =  $request->image->move(public_path('product_attr_images'), $imageName);
        $product->image = $imageName;
        $product->mrp = $request->mrp;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->size_id = $request->size_id;
        $product->color_id = $request->color_id;
        if($request->status == 'on'){
            $product->status = 'Active';
        }
        else{
            $product->status = 'Not Active';
        }
        $product->save();
        return redirect('products')->with('success', 'New Product Attribute added successfully');
    }
    public function delete($id){
        ProductAttr::find($id)->delete();
        return redirect()->back()->with('success', 'The product deleted successfully');
    }
    public function edit($id){
        $title = "Edit product";
        $product = ProductAttr::find($id);
        // $categories = Category::all();
        $url = '/update_product_attr' . '/' . $id;
        // dd($product);
        return view('admin.product_attr.edit_product',get_defined_vars());
    }
    public function update($id, Request $request){
        // dd($request->all());
        $request->validate([
            "products_id" => 'required',
            "sku" => 'required',
            "slug" => 'required',
            "image" => 'required',
            "mrp" => 'required',
            "price" => 'required',
            "qty" => 'required',
            "size_id" => 'required',
            "color_id" => 'required',
        ]);
        // dd($request->all());
        $product = new ProductAttr();
        $product->products_id = $request->products_id;
        $product->sku = $request->sku;
        $product->slug = $request->slug;
        $imageName = time() . '.' . $request->image->extension();
        $path =  $request->image->move(public_path('product_images'), $imageName);
        $product->image = $imageName;
        $product->mrp = $request->mrp;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->size_id = $request->size_id;
        $product->color_id = $request->color_id;
        if($request->status == 'on'){
            $product->status = 'Active';
        }
        else{
            $product->status = 'Not Active';
        }
        // dd($request->all());
        $product->save();
        return redirect('product_attr')->with('success', 'The product attribute updated successfully');
    }
}
