<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Slider;
use Carbon\Carbon;
use Storage;

class ProductController extends Controller
{
    public function viewproduct(){
        $products = Product::get();
        return view('Admin.producttable')->with('products', $products);
    }

    public function Addproduct(){
        $categories = Category::All()->pluck('category_name', 'category_name');
        return view('Admin.addproduct')->with('categories', $categories);
        return view('Admin.edit_product')->with('categories', $categories);
    }
    public function saveproduct(Request $request){
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_image' => 'image|nullable|max:1999'
        ]);
       if ($request->input('product_category')) {
        if($request->hasfile('product_image'))
        {
        $file = $request->file('product_image')->getClientOriginalName();     
        $fileName = pathinfo($file,PATHINFO_FILENAME); 
        $extension = $request->file('product_image') ->getClientOriginalExtension();   
        $filenamestore = $fileName.'_'.time().'.'.$extension;
        ///upload image
        $path = $request->file('product_image')->storeas('public/product_images',$filenamestore);
       }
       else {
           $filenamestore ='noimage.jpg';
       }

       $product = new Product;
       $product->product_name = $request->input('product_name');
       $product->product_price = $request->input('product_price');
       $product->product_category = $request->input('product_category');
       $product->product_image=$filenamestore;
       $product->created_at = Carbon::now();
       $product->status = 1;
       $product->save();

       return redirect('/addproduct')->with('status','The '. $product->product_name.' successfully added');
          
       } else {
        return redirect('/addproduct')->with('status1',' Select category please');
       }
       
    }

    public function UpdateProduct(Request $request){
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_image' => 'image|nullable|max:1999'
        ]);
        
       $product = Product::find($request->input('id'));
       $product->product_name = $request->input('product_name');
       $product->product_price = $request->input('product_price');
       $product->product_category = $request->input('product_category');

       if($request->hasfile('product_image')){
        $file = $request->file('product_image')->getClientOriginalName();     
        $fileName = pathinfo($file,PATHINFO_FILENAME); 
        $extension = $request->file('product_image') ->getClientOriginalExtension();   
        $filenamestore = $fileName.'_'.time().'.'.$extension;
        ///upload image
        $path = $request->file('product_image')->storeas('public/product_images',$filenamestore);
        $old_image = Product::find($request->input('id'));
        if($old_image->product_image!='noimage.jpg') {
            Storage::delete('public/product_images/'.$old_image->product_image);
        }
        $product->product_image=$filenamestore;
       }

       $product->created_at = Carbon::now();
       $product->update();
       return redirect('/view_product')->with('status1','The '. $product->product_name. ' update succesfull');
    }

    public function DeleteProduct($id){
        $product = Product::find($id);
        if($product->product_image != 'noimage.jpg'){
            Storage::delete('public/product_images/'.$product->product_image );
        }
        $product->delete();
        return redirect('/view_product')->with('status','The '. $product->product_name. ' delete succesfull');
    }
    public function EditProduct($id)
    {
        $categories = Category::All()->pluck('category_name');
        $product = Product::find($id);
        return view('Admin.edit_product')->with('product', $product)->with('categories', $categories );
    }
    public function Unactivateproduct($id){
        $product = Product::find($id);
        $product->status=0;
        $product->update();
        return redirect('/view_product')->with('status','The '. $product->product_name. ' Unactivate succesfull');
    }
    public function activateproduct($id){
        $product = Product::find($id);
        $product->status=1;
        $product->update();
        return redirect('/view_product')->with('status','The '. $product->product_name. ' Activate succesfull');
    }

    // Slider part controlller
    public function viewslider(){
        $sliders = Slider::get();
        return view('Admin.slidertable')->with('sliders', $sliders);
    }
    public function saveslider(Request $request){
        $validatedData = $request->validate([
            'describtion_one' => 'required',
            'describtion_two' => 'required',
            'slider_image' => 'image|nullable|max:1999'
        ]);
        if($request->hasfile('slider_image'))
        {
        $file = $request->file('slider_image')->getClientOriginalName();     
        $fileName = pathinfo($file,PATHINFO_FILENAME); 
        $extension = $request->file('slider_image') ->getClientOriginalExtension();   
        $filenamestore = $fileName.'_'.time().'.'.$extension;
        ///upload image
        $path = $request->file('slider_image')->storeas('public/slider_image',$filenamestore);
       }
       else {
           $filenamestore ='noimage.jpg';
       }
        $slider = new Slider;
        $slider->describtion_one = $request->input('describtion_one');
        $slider->describtion_two = $request->input('describtion_two');
        $slider->slider_image=$filenamestore;
        $slider->created_at = Carbon::now();
        $slider->slider_status = 1;
        $slider->save();
        return redirect('/addslider')->with('status','The slider added succesfull');
    }
    public function Deleteslider($id){
        $slider = Slider::find($id);
        if($slider->slider_image != 'noimage.jpg'){
            Storage::delete('public/slider_image/'.$slider->slider_image );
        }
        $slider->delete();
        return redirect('/view_slider')->with('status','The slider delete succesfull');
    }
    public function Unactivateslider($id){
        $slider = Slider::find($id);
        $slider->slider_status=0;
        $slider->update();
        return redirect('/view_slider')->with('status','The slider Unactivate succesfull');
    }
    public function activateslider($id){
        $slider = Slider::find($id);
        $slider->slider_status=1;
        $slider->update();
        return redirect('/view_slider')->with('status','The slider Activate succesfull');
    }
    public function EditSlider($id){
        $slider = Slider::find($id);
        return view('Admin.edit_slider')->with('slider', $slider);
    }
    public function updateslider(Request $request){
        $validatedData = $request->validate([
            'describtion_one' => 'required',
            'describtion_two' => 'required',
            'slider_image' => 'image|nullable|max:1999'
        ]);
    
        $slider = Slider::find($request->input('id'));
        $slider->describtion_one = $request->input('describtion_one');
        $slider->describtion_two = $request->input('describtion_two');
        if($request->hasfile('slider_image')){
            $file = $request->file('slider_image')->getClientOriginalName();     
            $fileName = pathinfo($file,PATHINFO_FILENAME); 
            $extension = $request->file('slider_image') ->getClientOriginalExtension();   
            $filenamestore = $fileName.'_'.time().'.'.$extension;
            ///upload image
            $path = $request->file('slider_image')->storeas('public/slider_image',$filenamestore);
            $old_image = Slider::find($request->input('id'));
            if($old_image->slider_image!='noimage.jpg') {
                Storage::delete('public/slider_image/'.$old_image->slider_image);
            }
            $slider->slider_image=$filenamestore;
           }
           $slider->update();
           return redirect('/view_slider')->with('status','The slider update succesfull');
    }
    public function vieworder(){
        return view('Admin.ordertable');
    }
}
