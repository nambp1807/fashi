<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{


    public function home()
    {
        $newests = Product::Where('category_id',2)->take(5)->get();
        $cheaps = Product::Where('category_id',1)->take(5)->get();

        return view("home",['newests'=>$newests,'cheaps'=>$cheaps]);
    }

    public function listing($id){
        $products = Product::where("category_id",$id)->take(9)->get();

        return view("listing",['product'=>$products]);
    }

    public function product($id)
    {
        $product = Product::find($id);//tra ve 1 object Product theo id
        $category_products = Product::Where('category_id',$product->category_id)->Where('id','!=',$product->id)->take(4)->get();
        $brand_products = Product::Where('brand_id',$product->brand_id)->Where('id','!=',$product->id)->take(4)->get();

        return view('product',['product'=>$product,'category_product'=>$category_products,'brand_product'=>$brand_products]);
    }

    public function shopping($id,Request $request){
        $product = Product::find($id);
//        $product->update([
//            "quantity" => $product->quantity-1
//        ]);
        $cart = $request->session()->get('cart');
        if ($cart == null){
            $cart =[];
        }
        foreach ( $cart as $p){
            if ($p ->id == $product ->id){
                $p->cart_qty = $p->cart_qty +1;
                session(['cart'=>$cart]);
                return redirect()->to("cart");
            }
        }
        $product -> cart_qty =1;
        $cart [] = $product;
        session(['cart'=>$cart]);
        return redirect()->to("cart");
    }

    public function cart(Request $request)
    {
        $cart=$request->session()->get("cart");
        if ($cart == null) {
            $cart = [];
        }
        $cart_total =0;
        foreach ($cart as $p){
            $cart_total +=($p->price*$p->cart_qty);
        }
        return view("cart",["cart"=>$cart,"cart_total"=>$cart_total]);
    }

    public function filter($c_id,$b_id){
            $product = Product::Where('category_id',$c_id)->Where("brand_id",$b_id)->get();
    }

//    public function clearCart(Request $request){
//        $request->session()->forget("cart");
//        //xoa nhieu hon 1
//        $request->session()->forget("[]");
//        return redirect()->to("/");
//    }
    public function clearCart(Request $request)
    {
        $request->session()->forget("cart");

        return redirect()->to("/");
    }
    public function clearOneCart($id,Request $request)
    {
        $cart=$request->session()->get("cart");
        $arrlength = count($cart);
        $arr[]=[$id];
        for($i=0;$i<$arrlength;$i++){

            if($cart[$i]->id==$arr[0]){
                $cart->delete($i);
            }else{
                $i+=1;
            }
        }

        return redirect()->to("/");
    }
    public function checkOut(Request $request){
        if (!$request->session()->has("cart")){
            return redirect()->to("/");
        }

        $cart=$request->session()->get("cart");
        $cart_total =0;
        foreach ($cart as $p) {
            $cart_total += ($p->price * $p->cart_qty);
        }
        return view('checkout',['cart_total'=>$cart_total]);
    }

    public function placeOrder(Request $request){

        $request->validate([
                "customer_name"=>'required | string',
                "shipping_address"=>'required ',
                "payment_total"=>'required',
                "telephone"=>'required',
            ]);

        $cart = $request->session()->get('cart');
        $grand_total = 0;
        foreach ($cart as $p){
            $grand_total += ($p->price * $p->cart_qty);
        }
        $order = Order::create([
            'user_id'=>Auth::id(),
            'customer_name'=>$request ->get('customer_name'),
            'shipping_address'=>$request ->get('shipping_address'),
            'telephone'=>$request ->get('telephone'),
            'grand_total'=>$grand_total,
            'payment_total'=>$request ->get('payment_total'),
            'status'=>Order::STATUS_PENDING

        ]);
        foreach ($cart as $p){
            DB::table("orders_products")->insert([
                'order_id'=>$order->id,
                'product_id'=>$p->id,
                'qty'=>$p->cart_qty,
                'price'=>$p->price

            ]);
        }
        session()->forget('cart');
        return redirect()->to('checkout-success');
    }
    public function checkoutSuccess(){
            return view('shopping-success');
    }

    public function login(){

        return view('login');
    }
    public function register(){
        return view('register');
    }

}
