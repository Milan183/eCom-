<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use Session;

class ProductController extends Controller
{
    function index() {

        $data = Product::all();       
        return View('product', ['products' => $data]);
    }

    function detail($id) {

        $data = Product::find($id);
        return View('detail', ['product' => $data]);
    }

    function search(Request $request) {

        $data = Product::where('name', 'like', '%'.$request->input('query').'%')->get();
        return View('search', ['products' => $data]);
    }

    function addToCart(Request $request) {

        if($request->session()->has('user'))
        {
            $cart = new Cart;
            $cart->user_id=$request->session()->get('user')['id'];
            $cart->product_id=$request->product_id;
            $cart->save();
            return redirect('/products');
        }
        else
        {
            return redirect('/login');
        }
    }

    static function cartItem() {
       
        $userId = Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }

    function cartList() {
        
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return View('cartlist',['products' => $products]);        
    }

    function removeCart($id) {
        
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow() {

        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->sum('products.price');

        return View('ordernow',['total' => $total]);
    }

    function orderPlace(Request $request) {

        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id',$userId)->get();
        foreach($allCart as $cart) 
        {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "Delivered";
            $order->payment_method = $request->payment;
            $order->payment_status = "Pending";
            $order->address = $request->address;
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }
        $request->input();
        return redirect('/products');
    }

    function myOrders() {
        
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();

        return View('myorders',['orders' => $orders]);
    }
}
