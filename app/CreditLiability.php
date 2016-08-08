<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditLiability extends Model {

	protected $table='credit_liabilities';
	protected $fillable = ['trackingNo','userId','mode','confirmationCode','type','principal','installment','balance',
	                        'intrest','description','creditor','email','phone'];

}
