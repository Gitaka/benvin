<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveChat extends Model {

	protected $table = 'livechats';
	protected $fillable = ['name','email','description'];

}
