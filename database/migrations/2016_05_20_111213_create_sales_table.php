<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('userId');
			$table->string('mode');
			$table->string('receiptNo');
			$table->string('invoiceNo')->nullable();
			$table->string('orderNo')->nullable();
			$table->string('client');
			$table->string('email');
			$table->text('description');
			$table->string('confirmationCode')->nullable();
			$table->double('amount');
			$table->double('balance')->default(0.00);
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
		Schema::drop('sales');
	}

}
