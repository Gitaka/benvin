<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model {

	protected $table='expenses';
	protected $fillable=['trackingNo','paymentNo','userId','department','mode','confirmationCode','amount','balance',
	           'description','paidto','email','phone'];

}
