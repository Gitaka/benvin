<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products',function(Blueprint $table){
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('category');
			$table->string('description');
			$table->integer('quantity');
			$table->float('price');
			$table->string('productImg');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}