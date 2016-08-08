<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapitalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('capitals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('trackingNo');
			$table->integer('userId');
			$table->string('mode');
			$table->String('confirmationCode')->nullable();
			$table->string('shareholder');
			$table->string('phone');
			$table->String('email');
			$table->double('totalCapital');
			$table->double('amountReceived');
			$table->double('balance')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('capitals');
	}

}
