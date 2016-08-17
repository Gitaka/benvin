<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientMessage extends Model {

	protected $table='client_messages';
	protected $fillable=['email','message'];

}
