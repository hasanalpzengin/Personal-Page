<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->foreign('topic', 'comments_posts_FK')->references('id')->on('posts')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('owner', 'comments_users_FK')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->dropForeign('comments_posts_FK');
			$table->dropForeign('comments_users_FK');
		});
	}

}
