<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('userId');
			$table->string('orderNo');
			$table->string('client');
			$table->string('email');
			$table->string('deliveryNo');
			$table->text('description');
			$table->double('amountCharged');
			$table->double('amountPaid');
            $table->double('balance');
            $table->double('vat');
            $table->double('subTotal');
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
		Schema::drop('invoices');
	}

}
