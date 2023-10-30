<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Coupon;
class CartController extends Controller
{
    public function index(){
        $user = Auth::user();
        // dd($user);
        $carts = Cart::where('user_id',$user->id)->where('status','false')->with("product")->has("product")->get();
        // $coupon = Coupon::where('id',1)->first();
        // dd($carts);
            return view('website.cart', compact('carts'));
    }
    public function add_to_cart(Request $request){
    // dd($request->all());
    // $cart = new Cart();
    // $cart->product_id = $request->product_id;
    // $cart->qty = $request->qty;
    // $user = Auth::user();
    // $cart->user_id = $user->id;
    // $cart->save();
    // return redirect('cart');

    $product_id = $request->product_id;

    // Check if the product is already in the cart
    $cart = Cart::where('product_id', $product_id)
        ->where('user_id', Auth::user()->id)->where('status','false')
        ->first();
    // dd($cart);
    if (!$cart) {
        // Product is not in the cart; create a new cart entry
        $cart = new Cart();
        $cart->product_id = $product_id;
        $cart->qty = $request->qty;
        $cart->user_id = Auth::user()->id;
        $cart->save();
    } else {
        // Product is already in the cart; increase the quantity
        $cart->qty += $request->qty;
        $cart->save();
    }

    return redirect('cart');


    }
    public function deleteCart($id){
        $deletedCart = Cart::find($id);
        // dd($deletedCart);
        $deletedCart->delete();
        return redirect()->back();
    }
    public function updateCart(Request $request){
        // dd($request->all());
        $cart = Cart::find($request->id);
        // dd($cart);
        if($request->quantity > $request->maxValue){
            $request->quantity = $request->maxValue;
            $cart->qty = $request->quantity;
        }
        else{
            $cart->qty = $request->quantity;
        }
        $cart->save();
        $carts = Cart::where("user_id",$request->userId)->where('status','false')->with('product')->has("product")->get();
        return ["carts" => $carts];
    }
}
