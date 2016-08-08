<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model {

	protected $table='purchases';
	protected $fillable = ['trackingNo','userId','mode','confirmationCode','type','orderId','amountDue','amountSpent',
	                        'balance','description','supplier','email','phone'];

}
