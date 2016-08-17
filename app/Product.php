<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable= array('name','category','description','mquantity','price','productImg');
   protected $table='products';
   public function cartItems(){
   	 	return $this->hasMany('App\CartItem');
   }

}
