<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{
    public function index()
    {
    	$getallproducts = Product::get();
    	return view('shop.index', compact('getallproducts'));
    }

    //Add to Cart function
    public function getAddToCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;

    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart',$cart);

    	return redirect()->back();
    }

    // Display the Cart in the Cart page.
    public function getCart()
    {
    	if(!Session::has('cart'))
    	{
    		return view('shop.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);

    	return view('shop.shopping-cart', ['products' =>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    //Reduce the qty
    public function getReduceByOne($id)
    {
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->reduceByOne($id);
    	Session::put('cart',$cart);
    	return redirect()->back();
    }

    //Remove the item
    public function getRemoveItem($id)
    {
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->removeItem($id);
    	Session::put('cart',$cart);
    	return redirect()->back();
    }

    // Load the checkout page
    public function checkout()
    {
        return view('shop/checkout');
    }

    // 
    public function postcheckout(Request $request)
    {
        //dd($request);
        try{
            Stripe::setApiKey('sk_test_9rug65UKvOF1rmRUQLJ7uk9g00IaLuAz02');
            $charge = Charge::create([
                'amount'=> '1000',
                'currency'=>'INR',
                'source'=>$request->stripeToken,
                'description'=>'Order',
                'receipt_email'=>'example@example.com'

            ]);
        }catch(Exception $e){
            dd($e);
        }
    }
}
