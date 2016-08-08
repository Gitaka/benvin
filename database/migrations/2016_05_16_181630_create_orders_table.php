<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders',function(Blueprint $table){
			$table->increments('id');
			$table->integer('userId');
			$table->string('orderNo');
			$table->string('client');
			$table->string('description');
			$table->string('LPO No');
			$table->date('orderTime');
			$table->date('deliveryDeadline');
			$table->double('amountCharged');
			$table->double('amountPaid');
			$table->double('balance');
			$table->double('amountSpent');
			$table->double('profit');
			$table->string('status')->default('Received');

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
		Schema::drop('orders');
	}

}
