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

}
