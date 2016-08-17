<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedProduct extends Model {

	protected $table = 'saved_products';
	protected $fillable = ['userId','productId'];

}
