<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $table='orders';
	protected $fillable = ['userId','orderNo','client','email','description','lpoNo',
	                   'orderTime','deliveryDeadline','amountCharged','amountPaid','amountSpent','profit','balance','status'];

}
