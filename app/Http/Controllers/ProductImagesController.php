<?php

namespace App\Http\Controllers;

use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductImagesController extends Controller
{
    public function productImages(){
        dd('yes');
        $productImages = ProductImages::all();
        // dd($productImagess);
        $title = "productImages";
        return view('admin.productImages.productImages',get_defined_vars());
    }
    public function show_add_productImages_page(){
        $title = "Add productImages";
        return view('admin.productImages.add_productImages',get_defined_vars());
    }
    public function add_productImages(Request $request){
        $request->validate([
            "products_id" => 'required',
            "images" => 'required',
        ]);
        $productImages = new ProductImages();
        $productImages->products_id = $request->products_id;
        $imageName = time() . '.' . $request->images->extension();
        $path =  $request->images->move(public_path('productImages_images'), $imageName);
        $productImages->image = $imageName;
        if($request->status == 'on'){
            $productImages->status = 'Active';
        }
        else{
            $productImages->status = 'Not Active';
        }
        $productImages->save();
        return redirect('productImages')->with('success', 'New productImages added successfully');
    }
    public function delete($id){
        productImages::find($id)->delete();
        return redirect()->back()->with('success', 'The productImages deleted successfully');
    }
    public function edit($id){
        $title = "Edit productImages";
        $productImages = productImages::find($id);
        // dd($productImages);
        $url = '/update_productImages' . '/' . $id;
        return view('admin.productImages.edit_productImages',get_defined_vars());
    }
    public function update($id, Request $request){
        $productImages = productImages::find($id);
        $request->validate([
            "products_id" => 'required',
        ]);
        $productImages = new ProductImages();
        $productImages->products_id = $request->products_id;
        if($request->images){
            $imageName = time() . '.' . $request->images->extension();
            $path =  $request->images->move(public_path('productImages_images'), $imageName);
            $productImages->image = $imageName;
            if($request->status == 'on'){
        }
            $productImages->status = 'Active';
        }
        else{
            $productImages->status = 'Not Active';
        }
        // dd($request->all());
        $productImages->save();
        return redirect('productImages')->with('success', 'The productImages updated successfully');
    }

}
