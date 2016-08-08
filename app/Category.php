<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable= array('name','userId','description','categoryImg','isFeatured');
   protected $table='categories';


}
