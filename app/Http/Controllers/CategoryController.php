<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories(){
        $categories = Category::all();
        $title = "Categories";
        return view('admin.category.categories',get_defined_vars());
    }
    public function show_add_category_page(){
        $title = "Add Category";
        return view('admin.category.add_category',get_defined_vars());
    }
    public function add_category(Request $request){
        $request->validate([
            "category_name" => 'required|unique:categories',
            "image" => 'required',
        ]);
        $category = new Category();
        $category->category_name = $request->category_name;
        // dd('image');
        $imageName = time() . '.' . $request->image->extension();
        $path =  $request->image->move(public_path('assets/admin/category_images'), $imageName);
        $category->image = $imageName;
        // $category->category_slug = $request->category_slug;
        if($request->status == 'on'){
            $category->status = 'Active';
        }
        else{
            $category->status = 'Not Active';
        }
        // dd($request->all());
        $category->save();
        return redirect('categories')->with('success', 'New category added successfully');
    }
    // public function delete($id){
    //     Category::find($id)->delete();
    //     return redirect()->back()->with('success', 'The category deleted successfully');
    // }
    public function delete($id) {
        // Find the category
        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        // Delete the associated products
        Product::where('category_id', $id)->delete();

        // Delete the category
        $category->delete();

        return redirect()->back()->with('success', 'The category and its associated products have been deleted successfully.');
    }

    public function edit($id){
        $title = "Edit Category";
        $category = Category::find($id);
        $url = '/update_category' . '/' . $id;
        // dd($category);
        return view('admin.category.edit_category',get_defined_vars());
    }
    public function update($id, Request $request){
        $category = Category::find($id);
        $request->validate([
            "category_name" => 'required',
        ]);
        $category->category_name = $request->category_name;
        if($request->image){
            // dd('image');
            $imageName = time() . '.' . $request->image->extension();
            $path =  $request->image->move(public_path('assets/admin/category_images'), $imageName);
            $category->image = $imageName;
        }
        // $category->category_slug = $request->category_slug;
        // dd($request->all());
        if($request->status == 'on'){
            $category->status = 'Active';
        }
        else{
            $category->status = 'Not Active';
        }
        $category->save();
        return redirect('categories')->with('success', 'The category updated successfully');
    }

}
