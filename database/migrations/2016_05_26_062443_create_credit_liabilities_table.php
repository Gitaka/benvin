<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditLiabilitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credit_liabilities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('trackingNo');
            $table->integer('userId');
			$table->string('mode');
			$table->string('type');
			$table->double('principal');
			$table->double('intrest');
			$table->double('installment');
			$table->double('balance');
			$table->string('confirmationCode')->nullable();
			$table->text('description');
			$table->string('creditor');
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
		Schema::drop('credit_liabilities');
	}

}
