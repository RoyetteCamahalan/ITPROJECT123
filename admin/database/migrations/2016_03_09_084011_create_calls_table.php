<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calls', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('INST_DOC_ID_FK');
			$table->integer('day_number');
			$table->integer('STATUS_ID_FK');
			$table->integer('PLANNED');
			$table->integer('MAKEUP');
			$table->datetime('START_DATETIME');
			$table->datetime('END_DATETIME');
			$table->double('LATITUDE');
			$table->double('LONGITUDE');
			$table->integer('RESCHEDULE_DATE');
			$table->integer('SIGNED_DAY_ID');
			$table->longText('RETRY_COUNT');
			$table->integer('JOINT_CALL');
			$table->integer('QUICK_SIGN');
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
		Schema::drop('calls');
	}

}
