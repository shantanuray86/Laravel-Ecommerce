<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use URL;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Display the Admin Dashboard page
    public function dashboard()
    {
    	return view('admin/dashboard');
    }

    // Display the Add product page
    public function addproduct()
    {
    	return view('admin/addproduct');
    }


    // Add the product to the products table
    // @params $request contains the products table fields form
    public function addproductsave(Request $request)
    {

    	$product_image = $request->file('product_image');
    	
    	$product_image_new_name = rand().".".$product_image->getClientOriginalExtension();
    	$product_image->move(public_path('productImage'), $product_image_new_name);
    	$product_title = $request->title;
    	$product_description = $request->description;
    	$product_price  = $request->price;

    	$product = new Product();

    	$product->title       = $product_title;
    	$product->price       = $product_price;
    	$product->description = $product_description;
  		$product->imagePath   = URL::to('/')."/productImage/".$product_image_new_name;
    	$product->save();

        return redirect('/admin/products')->with('status','Product Added Successfully');

    }

    // Display All Products
    public function displayproducts()
    {
        $products = Product::all();
        return view('admin/productlisting',compact('products'));
    }

    // Edit product
    // @param id of the products table row
    public function editproduct($id)
    {
        $product = Product::find($id);
        return view('admin/editproduct',compact('product'));
    }

    // Update product
    // @param id of the products table row
    public function updateproduct(Request $request, $id)
    {
        //dd($request);
        // Validate the form fields in the edit product page
        $this->validate($request,[
                'title' =>'required',
                'price' =>'required|integer',
                'description' =>'required|max:300'
        ]);


        $product = Product::find($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;

        if($request->hasfile('product_image'))
        {

            $product_image = $request->file('product_image');
            
            $product_image_new_name = rand().".".$product_image->getClientOriginalExtension();

            $product_image->move(public_path('productImage'), $product_image_new_name);

            $product->imagePath   = URL::to('/')."/productImage/".$product_image_new_name;

        }

        // Save the product
        $product->save();
        return redirect('/admin/products');
    }

    // Delete the product
    // @params product id
    public function deleteproduct($id)
    {
        $res=Product::find($id)->delete();
        if($res)
        {
            return redirect('/admin/products')->with('status','Product Deleted Successfully');
        }else{
            return redirect('/admin/products')->with('status','Product Could Not Be Deleted Successfully');
        }
    } 
}
