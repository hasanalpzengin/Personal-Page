<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('posts', function(Blueprint $table)
		{
			$table->foreign('category', 'posts_categories_FK')->references('id')->on('categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('author', 'posts_users_FK')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function(Blueprint $table)
		{
			$table->dropForeign('posts_categories_FK');
			$table->dropForeign('posts_users_FK');
		});
	}

}
