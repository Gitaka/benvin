<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	protected $table='tasks';
	protected $fillable = ['userId','title','task','startDate','endDate','staffId','orderId','clientId'];

}
