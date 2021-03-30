<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Category;

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
public function Cart(){
    return view('client.Cart');
}
public function Checkout(){
    return view('client.Checkout');
}
public function Login(){
    return view('client.login');
}
public function Signup(){
    return view('client.Signup');
}
}
