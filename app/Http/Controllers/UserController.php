<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order_Product;
use Auth;

class UserController extends Controller
{
    public function getallmyorders()
    {
    	$id = Auth::id();
    	//echo $id;
    	$orders = Order_Product::where('user_id',$id)->get();
    	//dd($orders->); die();
        return view('user\allmyorders',compact('orders'));
    }
}
