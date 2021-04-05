<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Category;
use Session;
use Stripe\Charge;
use Stripe\Stripe;
use App\Cart;

class ClientController extends Controller
{
 public function Home(){
     $sliders = Slider::get();
     $products = Product::get();
     return view('client.Home')->with('sliders', $sliders)->with('products', $products);
}

public function Shop(){
    $categories = Category::get();
    $products = Product::get();
    return view('client.Shop')->with('products', $products)->with('categories', $categories);
}

public function Checkout(){
    if(!Session::has('cart')){
        return redirect('/cart');
    }
    return view('client.Checkout');
}
public function postcheckout(Request $request){
    
    if(!Session::has('cart')){
        return redirect('/cart'); 
        // , ['Products' => null]           
    }
    //$oldCart = Session::get('cart');
   // $cart = new Cart($oldCart);

    Stripe::setApiKey('sk_test_51IcEMlKwFJR8uVuT2FcSL2rDTQppQAVJsC8Ydwhf1hmH6EVL3ATauTnouhk8KL5vYNNt8ht1dYz9wV0Q7kNcPNIv00I5pAUdZp
    ');
    try{
        Charge::create(array(
            "amount" =>Session::get('cart')->totalPrice* 100,
            "currency" => "usd",
            "source" => $request->input('stripeToken'), // obtainded with Stripe.js
            "description" => "Test Charge"
        ));
    } catch(\Exception $e){
        Session::put('error', $e->getMessage());
        return redirect('/checkout');
    }

    Session::forget('cart');
    return redirect('/cart')->with('status', 'Purchase accomplished successfully !');;

    
}
public function Login(){
    return view('client.login');
}
public function Signup(){
    return view('client.Signup');
}
}
