<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title', 150);
			$table->text('text', 65535)->nullable();
			$table->boolean('isVisible')->nullable()->default(1);
			$table->integer('author')->index('posts_users_FK');
			$table->dateTime('post_date')->nullable();
			$table->dateTime('modify_date')->nullable();
			$table->string('image_name', 100)->nullable()->default('NoImage');
			$table->integer('category')->nullable()->index('posts_categories_FK');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
