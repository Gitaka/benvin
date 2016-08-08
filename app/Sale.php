<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model {

	protected $table='sales';
	protected $fillable = ['userId','mode','receiptNo','invoiceNo','orderNo','client',
	                    'email','description','confirmationCode','amountCharged','amountPaid','balance'];

}
