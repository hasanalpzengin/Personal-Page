<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('skills', function(Blueprint $table)
		{
			$table->foreign('category', 'skills_categories_FK')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('skills', function(Blueprint $table)
		{
			$table->dropForeign('skills_categories_FK');
		});
	}

}
