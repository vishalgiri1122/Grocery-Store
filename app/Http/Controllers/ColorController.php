<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function colors(){
        $colors = Color::all();
        $title = "Colors";
        return view('admin.color.colors',get_defined_vars());
    }
    public function show_add_color_page(){
        $title = "Add color";
        return view('admin.color.add_color',get_defined_vars());
    }
    public function add_color(Request $request){
        $request->validate([
            "color" => 'required|unique:colors'
        ]);
        $color = new Color();
        $color->color = $request->color;
        if($request->status == 'on'){
            $color->status = 'Active';
        }
        else{
            $color->status = 'Not Active';
        }
        // dd($request->all());
        $color->save();
        return redirect('colors')->with('success', 'New color added successfully');
    }
    public function delete($id){
        Color::find($id)->delete();
        return redirect()->back()->with('success', 'The color deleted successfully');
    }
    public function edit($id){
        $title = "Edit color";
        $color = Color::find($id);
        $url = '/update_color' . '/' . $id;
        return view('admin.color.edit_color',get_defined_vars());
    }
    public function update($id, Request $request){
        $color = Color::find($id);
        $request->validate([
            "color" => 'required'
        ]);
        $color->color = $request->color;
        // dd($request->all());
        if($request->status == 'on'){
            $color->status = 'Active';
        }
        else{
            $color->status = 'Not Active';
        }
        $color->save();
        return redirect('colors')->with('success', 'The color updated successfully');
    }

}
