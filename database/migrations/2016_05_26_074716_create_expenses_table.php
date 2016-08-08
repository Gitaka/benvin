<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('trackingNo');
			$table->integer('paymentNo')->default(1);
            $table->integer('userId');
            $table->string('department');
			$table->string('mode');
			$table->string('confirmationCode')->nullable();
			$table->double('amount');
			$table->double('balance')->default(0);
			$table->text('description');
			$table->string('paidto');
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
		Schema::drop('expenses');
	}

}
