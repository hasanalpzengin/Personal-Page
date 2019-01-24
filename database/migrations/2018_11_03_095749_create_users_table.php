<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('username', 50);
			$table->string('password', 60)->nullable();
			$table->dateTime('last_connection')->nullable();
			$table->integer('permission')->nullable()->default(3);
			$table->string('name', 50)->nullable();
			$table->string('surname', 50)->nullable();
			$table->string('email', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
