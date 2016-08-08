<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

	protected $table='carts';
	protected $fillable=['user_id'];
   public function User(){
   	return $this->belongsTo('App\User');
   }
   public function cartItems(){
   	return $this->hasMany('App\CartItem');
   }
}
