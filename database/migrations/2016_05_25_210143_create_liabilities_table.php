<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiabilitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('liabilities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('trackingNo');
			$table->string('mode');
			$table->string('confirmationCode')->nullable();
			$table->integer('userId');
			$table->double('amount');
			$table->double('intrest');
			$table->double('perInstallment');
		   $table->double('balance');
			$table->string('creditor');
			$table->string('email');
			$table->string('phone');
			$table->text('description');
			$table->date('completion');
			$table->date('deadline');
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
		Schema::drop('liabilities');
	}

}
