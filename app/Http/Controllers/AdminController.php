<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Html\FormFacade;

class AdminController extends Controller
{
    public function Dashboard(){
        return view('Admin.dashboard');
    }
   
  
    public function Addslider(){
        return view('Admin.addslider');
    }
  
}
