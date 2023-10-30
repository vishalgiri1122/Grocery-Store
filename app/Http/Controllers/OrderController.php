<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
class OrderController extends Controller
{
    public function orders(Request $request)
    {
        // Retrieve orders with associated carts and products
        $orders = Order::with('user','cart.product')->get();
        $title = "Orders";
        // dd($orders);
        return view('admin.orders.index', compact('orders','title'));
    }
    public function order_details($id){
        $order = Order::with('user','cart.product')->where("id",$id)->first();
        $title = "Order Details";
        // dd($order);
        return view("admin.orders.details",get_defined_vars());
    }
    public function order_update_status(Request $request){
        $id = $request->itemId;
        $status = $request->status;
        // dd($status);
        $order = Order::find($id);
        $order->status = $status;
        // dd($order);
        // $email = $order->email;
        // if($order->status == 'Complete'){
        //     $data = [
        //     'orderId' => $id, // You can add more data as needed
        //     ];
        //     Mail::send('admin.email.order_complete_template', $data, function ($message) use ($email) {
        //     $message->to('keharsarfraz90@gmail.com')
        //     ->cc($email)
        //     ->subject('Order Completed');
        //     $message->from('keharjohn@gmail.com', 'eshop online store');
        //     // dd($carts);
        // });
        // }
        $order->save();
        return view("admin.orders.index",get_defined_vars());
    }
    // public function track_order($id){
    //     // $orders = Order::where('user_id', $id)->with('user', 'cart.product.category')->get();
    //     // // dd($orders);
    //     // return view('website.track_order',get_defined_vars());
        
    //     // new code 
    //     $orders = Order::where('user_id', $id)->with('user', 'cart.product.category')->get();

    // // Convert created_at time in each order to the Brisbane time zone
    // foreach ($orders as $order) {
    //     $order->created_at = Carbon::parse($order->created_at)->setTimezone('Australia/Brisbane');
    // }

    // return view('website.track_order', compact('orders'));
    // }
//     public function track_order($id) {
//     // Calculate the timestamp 45 minutes ago
//     $fortyFiveMinutesAgo = Carbon::now()->subMinutes(45);

//     $orders = Order::where('user_id', $id)
//         ->where('created_at', '>=', $fortyFiveMinutesAgo)
//         ->with('user', 'cart.product.category')
//         ->get();

//     // Convert created_at time in each order to the Brisbane time zone
//     foreach ($orders as $order) {
//         $order->created_at->setTimezone('Australia/Brisbane');
//     }

//     return view('website.track_order', compact('orders'));
// }
public function track_order($id) {
    // Get the most recent timestamp of an order
    $latestOrderTime = Order::where('user_id', $id)
        ->max('created_at');

    // Get orders placed at the most recent time
    $orders = Order::where('user_id', $id)
        ->where('created_at', $latestOrderTime)
        ->with('user', 'cart.product.category')
        ->get();

    // Convert created_at time in each order to the Brisbane time zone
    foreach ($orders as $order) {
        $order->created_at->setTimezone('Australia/Brisbane');
    }
    // dd($orders);
    return view('website.track_order', compact('orders'));
}
}
