<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    // public function index(){
    //     $user = Auth::user();
    //     $products = Product::with("category")
    //     ->orderBy('category_id')
    //     ->get();
    //     $categories = Category::withCount('products')->has('products')->get();
    //     return view("website.index",get_defined_vars());
    // }
    public function index() {
    $banners = Banner::all();
    $user = Auth::user();
    $trending_products = Product::with("category")->where('in_stock','>', 0)
        ->orderBy('category_id')->take(8)
        ->get();
        // dd($trending_products);
    $products = Product::with("category")->where('in_stock','>', 0)
        ->orderBy('category_id')
        ->get();
    $categories = Category::withCount('products')->has('products')->get();

    // Calculate the maximum allowed cart quantity for each product
    if($user){

    $maxCartQuantities = [];

    foreach ($products as $product) {
        $product_id = $product->id;

        // Calculate the total quantity of this product in the user's cart
        $totalCartQuantityForProduct = $user->carts()
            ->where('product_id', $product_id)
            ->where('status', 'false')
            ->sum('qty');

        // Calculate the maximum allowed cart quantity for this product
        $maxCartQuantities[$product_id] = $product->in_stock - $totalCartQuantityForProduct;
    }
    }
    // just arrived products
    $newProducts = Product::orderBy('created_at', 'desc')
        ->take(8) // You can adjust the number of products to display
        ->get();

    return view("website.index", get_defined_vars());
}


    public function searchCategory($name){
        $banners = Banner::all();
        $selectedCategory = $name;
        // dd($selectedCategory);
        $products = Product::whereHas('category', function ($query) use ($name) {
        $query->where('category_name', $name)->where('in_stock','>', 0);
        })->get();
        // dd($products);
        $categories = Category::withCount('products')->has('products')->get();
        $user = Auth::user();
        if($user){

        $maxCartQuantities = [];

        foreach ($products as $product) {
            $product_id = $product->id;

            // Calculate the total quantity of this product in the user's cart
            $totalCartQuantityForProduct = $user->carts()
                ->where('product_id', $product_id)
                ->where('status', 'false')
                ->sum('qty');

            // Calculate the maximum allowed cart quantity for this product
            $maxCartQuantities[$product_id] = $product->in_stock - $totalCartQuantityForProduct;
        }
        }


        return view("website.category_products",get_defined_vars());
    }
    public function searchProduct(Request $request) {
        $banners = Banner::all();
    $slug = $request->input('slug');

    $products = Product::with('category')
        ->where(function ($query) use ($slug) {
            $query->where('name', 'LIKE', '%' . $slug . '%')
                ->orWhereHas('category', function ($subQuery) use ($slug) {
                    $subQuery->where('category_name', 'LIKE', '%' . $slug . '%');
                });
        })
        ->get();


    //
    $categories = Category::withCount('products')->has('products')->get();
        $user = Auth::user();
        if($user){

        $maxCartQuantities = [];

        foreach ($products as $product) {
            $product_id = $product->id;

            // Calculate the total quantity of this product in the user's cart
            $totalCartQuantityForProduct = $user->carts()
                ->where('product_id', $product_id)
                ->where('status', 'false')
                ->sum('qty');

            // Calculate the maximum allowed cart quantity for this product
            $maxCartQuantities[$product_id] = $product->in_stock - $totalCartQuantityForProduct;
        }
        }


        // dd($products);
        return view("website.search_products",get_defined_vars());

}

    public function searchSuggestions(Request $request)
    {
        $banners = Banner::all();
        // dd($request->all());
        $query = $request->input('query'); // Get the search query from the request
        $suggestions = Product::where('name', 'LIKE', '%' . $query . '%')->limit(5)->get();
        // dd($suggestions);
        return response()->json($suggestions);
    }
    public function shop(){
        $products = Product::all();
        // dd($products);
        return view("website.shop",get_defined_vars());
    }
    // public function product_details($id){
    //     // $product = Product::with("brand","color","size")->find($id);
    //     $categories = Category::all();
    //     $product = Product::with("category")->find($id);
    //     // dd($product);
    //     $category_id = $product->category->id;
    //     // dd($category_id);
    //     $same_products = Product::with("category")->where('category_id',$category_id)->get();
    //     // dd($same_products);
    //     return view("website.product_detail",get_defined_vars());
    // }
    public function product_details($id) {
        $banners = Banner::all();
        $categories = Category::all();
    $product = Product::with("category")->find($id);
    $user = Auth::user();
    if($user){
        $carts = Cart::where('user_id', $user->id)->where('status', 'false')->with("product")->has("product")->get();

        $availableForCart = $product->in_stock; // Initialize with the product's in_stock

        // Calculate the available quantity for the specific product
        foreach ($carts as $cart) {
            if ($cart->product->id === $product->id) {
                $availableForCart -= $cart->qty;
            }
        }
    }
    // dd($availableForCart);
    $category_id = $product->category->id;
    // dd($category_id);
    $same_products = Product::with("category")->where('category_id',$category_id)->get();
    return view("website.product_detail",get_defined_vars());
}


    public function checkout(Request $request){
        $banners = Banner::all();
        $user = Auth()->user();
        // dd($user);
        $carts = Cart::where('user_id', $user->id)->where('status','false')->with('product')->has("product")->get();
        // dd($carts);
        return view("website.checkout", ['carts' => $carts, 'user' => $user]);
    }
    public function thankyou(){
        return view("website.thankyou");

    }
    public function showBannerIndex(){
        $title = "Website Banner";
        $banners = Banner::all();
        // dd($banners);
        return view("admin.banner.index",get_defined_vars());
    }
    public function add_banner_get(){
        $title = "Website Banner" ;
        return view("admin.banner.add_banner",get_defined_vars());
    }
    public function add_banner_post(Request $request)
{
    $title = "Website Banner";

    foreach ($request->img as $key => $imgBanner) {
        // dd($request->img[0]);
        $b = new Banner();
        $imageName = "";
        $imageName = random_int(100000, 999999) . '.' . $request->img[$key]->extension();
        $path =  $request->img[$key]->move(public_path('assets/admin/banners/'), $imageName);
        $b->img = $imageName;
        $b->save();
    }

    // dd("here");
    return redirect('/banner');
}
public function delete_banner($id){
    // dd($id);
    $banner = Banner::find($id)->delete();
    return redirect('/banner');
}



}
