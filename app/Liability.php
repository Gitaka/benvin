<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Liability extends Model {

	protected $table = 'liabilities';
	protected $fillable = [        
	     'trackingNo',
            'userId',
            'mode',
            'confirmationCode',
            'item',
            'amount',
            'intrest',
            'perInstallment',
            'balance',
            'description',
            'creditor',
            'completion',
            'phone',
            'deadline',
            'email'];

}
