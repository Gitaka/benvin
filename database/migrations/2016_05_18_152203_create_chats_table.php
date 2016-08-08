<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sender');
			$table->integer('receiver');
			$table->text('message');
			$table->timestamps();
		});

		Schema::create('usersCharts',function(Blueprint $table){
			$table->integer('userId');
			$table->integer('chatId');
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
		Schema::drop('chats');
		Schema::drop('usersCharts');
	}

}
