<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Slider;
use Carbon\Carbon;
use Storage;
use Session;
use App\Cart;

class CartController extends Controller
{
    public function addTocart($id){
        $product = Product::find($id);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
         $cart = new Cart($oldCart);
         $cart->add($product, $id);
         Session::put('cart', $cart);
         //dd(Session::get('cart'));
         return redirect('/shop');
     }

  
    public function Cart(){
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);
    }
    public function updatequantity(Request $request){
        //print('the product id is '.$request->id.' And the product qty is '.$request->quantity);
       
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/cart');
    }

    public function removeItem($product_id){
       
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($product_id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect('/cart');
    }

}
