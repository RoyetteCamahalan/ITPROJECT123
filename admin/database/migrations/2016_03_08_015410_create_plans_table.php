<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */


	/*CREATE TABLE IF NOT EXISTS `plans` (
		`ID` int(11) NOT NULL,
	  	`CYCLE_SET_ID_FK` int(11) NOT NULL,
	 	`CYCLE_NUMBER` int(11) NOT NULL,
	  	`STATUS_ID_FK` int(11) NOT NULL,
	  	`STATUS_DATE` datetime NOT NULL
	)*/
	public function up()
	{
		Schema::create('plans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id_fk');
			$table->integer('year');
			$table->integer('cycle_number');
			$table->integer('status_id')->default('0');
			$table->date('status_date')->nullable();
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
		Schema::drop('plans');
	}

}
