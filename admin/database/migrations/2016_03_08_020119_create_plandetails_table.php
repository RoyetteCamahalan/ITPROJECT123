<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlandetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */


	/*CREATE TABLE IF NOT EXISTS `plandetails` (
		`PLAN_DETAIL_ID` int(11) NOT NULL,
		`PLAN_ID_FK` varchar(255) NOT NULL,
		`CYCLE_DAY_ID_FK` int(11) NOT NULL,
		`INST_DOC_ID_FK` int(11) NOT NULL
	)*/
	public function up()
	{
		Schema::create('plandetails', function(Blueprint $table)
		{
			$table->increments('plan_detail_id');
			$table->integer('plan_id_fk');
			$table->integer('day_number');
			$table->integer('inst_doc_id_fk');
			$table->foreign('plan_id_fk')->references('id')->on('plans');
			$table->foreign('inst_doc_id_fk')->references('id')->on('institutiondoctorsmaps');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plandetails');
	}

}
