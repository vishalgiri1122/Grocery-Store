<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function sizes(){
        $sizes = Size::all();
        $title = "sizes";
        return view('admin.size.sizes',get_defined_vars());
    }
    public function show_add_size_page(){
        $title = "Add size";
        return view('admin.size.add_size',get_defined_vars());
    }
    public function add_size(Request $request){
        $request->validate([
            "size" => 'required|unique:sizes',
        ]);
        $size = new Size();
        $size->size = $request->size;
        if($request->status == 'on'){
            $size->status = 'Active';
        }
        else{
            $size->status = 'Not Active';
        }
        $size->save();
        return redirect('sizes')->with('success', 'New size added successfully');
    }
    public function delete($id){
        Size::find($id)->delete();
        return redirect()->back()->with('success', 'The size deleted successfully');
    }
    public function edit($id){
        $title = "Edit size";
        $size = Size::find($id);
        $url = '/update_size' . '/' . $id;
        return view('admin.size.edit_size',get_defined_vars());
    }
    public function update($id, Request $request){
        $size = Size::find($id);
        $request->validate([
            "size" => 'required',
        ]);
        $size->size = $request->size;
        if($request->status == 'on'){
            $size->status = 'Active';
        }
        else{
            $size->status = 'Not Active';
        }
        // dd($request->all());
        $size->save();
        return redirect('sizes')->with('success', 'The size updated successfully');
    }

}
