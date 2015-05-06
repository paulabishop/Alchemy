<?php

/*Author: Paula Bishop
Revision date: 4/17/15
File name: 2015_3_10_193636_create_users_table.php
Description: Migration to create users table through Eloquent ORM*/

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
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password')->unique();
			$table->string('role', 25);
			$table->string('fullname');
            $table->string('remember_token')->nullable();
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
		Schema::drop('users');
	}

}
