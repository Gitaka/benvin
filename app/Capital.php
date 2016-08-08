<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model {

	protected $table='capitals';
	protected $fillable = ['trackingNo','userId','mode','confirmationCode','shareHolder','phone',
	                        'email','totalCapital','amountReceived','balance'];

}
