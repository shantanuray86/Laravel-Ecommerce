<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    protected $fillable = ['user_id','product_price','product_id','order_id','product_qty'];

    public function getproductinfo()
    {
    	return $this->hasOne('App\Product','id','product_id');
    }

    // Get the user info from the user_id
    public function getuserinfo()
    {
    	return $this->hasOne('App\User','id','user_id');
    }
}
