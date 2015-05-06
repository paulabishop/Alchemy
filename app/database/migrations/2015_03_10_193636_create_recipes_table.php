<?php

/*Author: Paula Bishop
Revision date: 4/17/15
File name: 2015_3_10_193636_create_recipes_table.php
Description: Migration to create recipes table through Eloquent ORM*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recipes', function(Blueprint $table)
		{
            $table->increments('id');
			$table->integer('category_id')->unsigned();;
			$table->string('title');
            $table->text('description')->nullable();
			$table->integer('user_id')->unsigned();
			$table->string('keywords', 255)->index('keywords');
			$table->string('yields', 50)->nullable();
			$table->string('photo')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('ingredients');
			$table->text('directions');
			$table->string('prep_time', 100)->nullable()->index('prep_time');
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
		Schema::drop('recipes');
	}

}
