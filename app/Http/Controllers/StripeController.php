<?php



namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

use Stripe;
use Illuminate\Support\Facades\Auth;


class StripeController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe(Request $request)

    {
        // dd($request->all());
        // customer info
        $request->validate([
            "name" => 'required',
            "country" => 'required',
            "country" => 'required',
            "address" => 'required',
            "apartment" => 'required',
            "state" => 'required',
            "postal_code" => 'required',
            "email" => 'required|email',
            "phone" => 'required',
        ]);
        $username = $request->name;
        $country = $request->country;
        $address = $request->address;
        $apartment = $request->apartment;
        $state = $request->state;
        $postal_code = $request->postal_code;
        $email = $request->email;
        $phone = $request->phone;
        $user = Auth()->user();
        $carts = Cart::where('user_id',$user->id)->where("status","false")->with("product")->has('product')->get();
        // $price = $carts->product->price * $carts->qty;

        // dd($carts);
        return view('website.payment.stripe',get_defined_vars());

    }



    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)

    {
        $user = Auth()->user();
        $carts = Cart::where('user_id',$user->id)->where("status","false")->with("product")->has('product')->get();
        // minus sold quatity from the in_stock column of products table
        foreach ($carts as $cart) {
        // Get the product's quantity from the cart
        $quantitySold = $cart->qty;

        // Subtract the sold quantity from the product's in_stock quantity
        $product = $cart->product;
        $product->in_stock -= $quantitySold;

        // Save the updated product quantity
        $product->save();
        }
        $total = 0;
        foreach ($carts as $cart){
            $total = $total + ($cart->qty * $cart->product->price);
        }

        // dd($total);
        // dd($carts);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        Stripe\Charge::create ([

                "amount" => $total * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from darulsolutions."

        ]);



        Session::flash('success', 'Payment successful!');


       foreach($carts as $cart){
        $cart->status = 'true';
        $cart->save();
        //
        $order = new Order();
        $order->cart_id = $cart->id;
        $order->user_id = $user->id;
        // customer info
        $order->username = $request->username;
        $order->country = $request->country;
        $order->address = $request->address;
        $order->apartment = $request->apartment;
        $order->state = $request->state;
        $order->postal_code = $request->postal_code;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->save();
       }
        // send email to both admin and to the customer
        $data = [
            'name'=>$request->name ,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'apartment' => $request->apartment,
            'country' => $request->country,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
        ];
        Mail::send('admin.email.template', ['data' => $data,'carts' =>$carts], function ($message) use ($data,$carts) {
            $message->to('keharsarfraz90@gmail.com')
            ->cc($data['email'])
            ->subject('Product Summary');
            $message->from('keharjohn@gmail.com', 'eshop online store');
            // dd($carts);
        });
        return redirect('/thankyou');

    }
    public function on_delivery(Request $request){
        $user = Auth()->user();
        $carts = Cart::where('user_id',$user->id)->where("status","false")->with("product")->has('product')->get();
        // minus sold quatity from the in_stock column of products table
        foreach ($carts as $cart) {
        // Get the product's quantity from the cart
        $quantitySold = $cart->qty;

        // Subtract the sold quantity from the product's in_stock quantity
        $product = $cart->product;
        $product->in_stock -= $quantitySold;

        // Save the updated product quantity
        $product->save();
        }
        $total = 0;
        foreach ($carts as $cart){
            $total = $total + ($cart->qty * $cart->product->price);
        }
        foreach($carts as $cart){
            $cart->status = 'true';
            $cart->save();
            //
            $order = new Order();
            $order->cart_id = $cart->id;
            $order->user_id = $user->id;
            // customer info
            $username = $request->name;
            $order->username = $username;
            $order->country = $request->country;
            $order->address = $request->address;
            $order->apartment = $request->apartment;
            $order->state = $request->state;
            $order->postal_code = $request->postal_code;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->save();
           }
           $data = [
            'name'=>$request->name ,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'apartment' => $request->apartment,
            'country' => $request->country,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
        ];
           Mail::send('admin.email.template', ['data' => $data,'carts' =>$carts], function ($message) use ($data,$carts) {
            $message->to('brisgrocer@gmail.com')
            ->cc($data['email'])
            ->subject('Product Summary');
            $message->from('keharjohn@gmail.com', 'brisbane grocery store');
            // dd($carts);
        });
           return redirect('/thankyou');
    }


}
