<?php

/*Author: Paula Bishop
Revision date: 4/17/15
File name: 2015_3_10_193639_add_foreign_keys_to_recipes_table.php
Description: Migration to add foreign keys to recipes table from users and categories. I did this in a separate migration because initially I had some errors in command line doing them on the same migration as creating the table.*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRecipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('recipes', function(Blueprint $table)
		{
            $table->foreign('category_id', 'categoryID_fk')
                ->references('id')->on('categories')
                ->onUpdate('CASCADE')->onDelete('NO ACTION');

            $table->foreign('user_id', 'userID_fk')
                ->references('id')->on('users')
                ->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('recipes', function(Blueprint $table)
		{
			$table->dropForeign('userID_fk');
			$table->dropForeign('categoryID_fk');
		});
	}

}
