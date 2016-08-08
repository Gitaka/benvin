<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model {

	protected $table = 'assets';
	protected $fillable = ['trackingNo','userId','mode','item','amount',
	                   'balance','confirmationCode','description','client','email','phone'];

}
