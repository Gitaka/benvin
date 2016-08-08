<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class cartItem extends Model {

	protected $table='cartItems';
    protected $fillable = ['cart_id','product_id','quantity'];

    public function Cart(){
    	return $this->belongsTo('App\Cart');
    }
    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
