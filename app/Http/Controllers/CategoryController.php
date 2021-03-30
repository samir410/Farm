<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class CategoryController extends Controller
{
    public function Category(){
        return view('Admin.addcategory');
    }

    public function SaveCategory(Request $request){ 
       $this->validate($request, ['category_name' => 'required']);
       $check =  Category::where('category_name', $request->input('category_name'))->first();
       $category = new Category();
      if(!$check){
       $category->category_name = $request->category_name;
       $category->save();
       return redirect('/addcategory')->with('status','The '. $request->category_name. ' added succesfull');
      }
      else{
        return redirect('/addcategory')->with('status1','Sorry the '.$request->input('category_name').' category already exist');
      }
    }

    public function EditCategory($id){ 
      
      $category = Category::find($id);
      return view('Admin.editcategory')->with('category',  $category );
    }

    public function UpdateCategory(Request $request){
      $category=  Category::find($request->input('id'));
      
      $oldcat = $category->category_name;
      $category->category_name = $request->input('category_name');
      $data = array();
      $data['product_category']= $request->input('category_name'); 
      DB::table('products')->where('product_category', $oldcat)->update($data);
      
      $category->update();
      return redirect('/addcategory')->with('status','The '. $request->category_name. ' update succesfull');
    }
    public function DeleteCategory($id){
      $category = Category::find($id);
      $category->delete();
      return redirect('/view_category')->with('status','The '. $category->category_name. ' delete succesfull');
    }
 
    public function viewcategory(){
        $categories = Category::get();
        return view('Admin.categorytable')->with('categories',  $categories );
    }

    public function view_by_cat($name){
      $categories = Category::get();
      $products = Product::where('product_category', $name)->get();
      return view('client.shop')->with('categories',$categories)->with('products', $products);
  }
}
