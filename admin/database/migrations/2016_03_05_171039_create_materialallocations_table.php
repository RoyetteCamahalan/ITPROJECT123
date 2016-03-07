<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialallocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materialallocations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('material_map_fk');
			$table->integer('product_id_fk');
			$table->integer('material_id_fk');
			$table->integer('material_count');
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
		Schema::drop('materialallocations');
	}

}
