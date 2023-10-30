<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brands(){
        $brands = Brand::with('category')->has('category')->get();
        // dd($brands);
        $title = "brands";
        return view('admin.brand.brands',get_defined_vars());
    }
    public function show_add_brand_page(){
        $title = "Add brand";
        $categories = Category::all();
        // dd($categories);
        return view('admin.brand.add_brand',get_defined_vars());
    }
    public function add_brand(Request $request){
        $request->validate([
            "name" => 'required|unique:brands',
            "image" => 'required',
        ]);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->category_id = $request->category_id;
        $imageName = time() . '.' . $request->image->extension();
        $path =  $request->image->move(public_path('brand_images'), $imageName);
        $brand->image = $imageName;
        if($request->status == 'on'){
            $brand->status = 'Active';
        }
        else{
            $brand->status = 'Not Active';
        }
        $brand->save();
        return redirect('brands')->with('success', 'New Brand added successfully');
    }
    public function delete($id){
        Brand::find($id)->delete();
        return redirect()->back()->with('success', 'The brand deleted successfully');
    }
    public function edit($id){
        $title = "Edit brand";
        $brand = Brand::find($id);
        $categories = Category::all();
        // dd($brand);
        $url = '/update_brand' . '/' . $id;
        return view('admin.brand.edit_brand',get_defined_vars());
    }
    public function update($id, Request $request){
        $brand = Brand::find($id);
        $request->validate([
            "name" => 'required',
        ]);
        $brand->name = $request->name;
        $brand->category_id = $request->category_id;
        if($request->image){
            $imageName = time() . '.' . $request->image->extension();
            $path =  $request->image->move(public_path('brand_images'), $imageName);
            $brand->image = $imageName;
        }
        if($request->status == 'on'){
            $brand->status = 'Active';
        }
        else{
            $brand->status = 'Not Active';
        }
        // dd($request->all());
        $brand->save();
        return redirect('brands')->with('success', 'The brand updated successfully');
    }

}
