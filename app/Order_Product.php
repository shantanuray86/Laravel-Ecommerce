<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    protected $fillable = ['user_id','order_id','amount','total_product_qty'];

    // Get the user info from the Users table (Table join)
    public function getuserinfo()
    {
    	return $this->hasOne('App\User','id','user_id');
    } 

    // Get the purchased product info from the orders table 
    public function getproductfromordermodelinfo()
    {
    	return $this->hasMany('App\Order','order_id','order_id');
    } 
}
