<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateDoctorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctors', function(Blueprint $table)
		{
			$table->increments('doc_id');
			$table->string('doc_name',255);
			$table->integer('specialization_id_fk');
			$table->string('birthday',100)->nullable();
			$table->string('contact_number', 100)->nullable();
			$table->string('prc_license',50);
			$table->string('email')->nullable();
			$table->integer('is_active')->default('1');
			$table->timestamps();
			//$table->foreign('specialization_id_fk')->references('id')->on('specializations');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('doctors');
	}

}
