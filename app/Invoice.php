<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

	protected $table='invoices';
	protected $fillable=['invoiceNo','userId','client','email','deliveryNo','orderNo','description','amountCharged','amountPaid','balance'];

}
