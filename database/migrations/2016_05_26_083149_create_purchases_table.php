<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('trackingNo');
			$table->integer('userId');
			$table->string('mode');
			$table->string('confirmationCode')->nullable();
			$table->string('type');
			$table->string('lpo');
			$table->string('receiptNo');
			$table->double('amount');
			$table->double('balance');
			$table->text('description');
			$table->string('supplier');
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
		Schema::drop('purchases');
	}

}
