<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionDoctorsMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('institutiondoctorsmaps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('institution_id_fk');
			$table->integer('doctor_id_fk');
			$table->integer('class_id_fk');
			$table->string('best_time_to_call', 100)->nullable();
			$table->string('room_number',50);
			$table->string('default_products')->nullable();
			$table->timestamps();
			//$table->foreign('institution_id_fk')->references('id')->on('institution');
			//$table->foreign('doctor_id_fk')->references('doc_id')->on('doctors');
			//$table->foreign('class_id_fk')->references('id')->on('doctorclasses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('institutiondoctorsmaps');
	}

}
