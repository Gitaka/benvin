<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credit_assets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('trackingNo');
			$table->integer('userId');
			$table->string('mode');
			$table->string('confirmationCode')->nullable();
			$table->string('type');
			$table->text('description');
			$table->double('amount');
			$table->double('balance');
			$table->string('receiver');
			$table->string('email');
			$table->string('phone');
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
		Schema::drop('credit_assets');
	}

}
