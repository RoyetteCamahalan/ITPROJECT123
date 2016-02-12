<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table->string('fname');
			$table->string('mname',50)->nullable();
			$table->string('lname',50);
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('position',50);
			$table->integer('access_level');
			$table->date('hired_date')->nullable();
			$table->date('dob')->nullable();
			$table->integer('branch_id');
			$table->integer('is_active')->default('1');
			$table->rememberToken();
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
		Schema::dropIfExists('users');
	}

}
