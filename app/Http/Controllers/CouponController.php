<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function coupons(){
        $coupons = Coupon::all();
        $title = "Coupons";
        return view('admin.coupon.coupons',get_defined_vars());
    }
    public function show_add_coupon_page(){
        $title = "Add coupon";
        return view('admin.coupon.add_coupon',get_defined_vars());
    }
    public function add_coupon(Request $request){
        $request->validate([
            "title" => 'required|unique:coupons',
            "code" => 'required',
            "value" => 'required',
        ]);
        $coupon = new Coupon();
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->value = $request->value;
        if($request->status == 'on'){
            $coupon->status = 'Active';
        }
        else{
            $coupon->status = 'Not Active';
        }
        $coupon->save();
        return redirect('coupons')->with('success', 'New coupon added successfully');
    }
    public function delete($id){
        coupon::find($id)->delete();
        return redirect()->back()->with('success', 'The coupon deleted successfully');
    }
    public function edit($id){
        $title = "Edit coupon";
        $coupon = Coupon::find($id);
        $url = '/update_coupon' . '/' . $id;
        return view('admin.coupon.edit_coupon',get_defined_vars());
    }
    public function update($id, Request $request){
        $coupon = Coupon::find($id);
        $request->validate([
            "title" => 'required',
            "code" => 'required',
            "value" => 'required',
        ]);
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->value = $request->value;
        if($request->status == 'on'){
            $coupon->status = 'Active';
        }
        else{
            $coupon->status = 'Not Active';
        }
        // dd($request->all());
        $coupon->save();
        return redirect('coupons')->with('success', 'The coupon updated successfully');
    }

}
