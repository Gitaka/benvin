<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditAsset extends Model {

	protected $table= 'credit_assets';
	protected $fillable =['trackingNo','userId','mode','confirmationCode','type','description',
	                      'amount','balance','receiver','email','phone'];

}
