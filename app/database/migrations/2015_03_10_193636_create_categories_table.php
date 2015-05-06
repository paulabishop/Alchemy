<?php

/*Author: Paula Bishop
Revision date: 4/17/15
File name: 2015_3_10_193636_create_categories_table.php
Description: Migration to create categories table through Eloquent ORM*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
            $table->increments('id');
			$table->string('name', 45)->unique();
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
