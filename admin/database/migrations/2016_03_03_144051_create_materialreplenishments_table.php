<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialreplenishmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	/*CREATE TABLE IF NOT EXISTS `materialreplenishment` (
		`ID` int(11) NOT NULL,
		  `CYCLE_SET_ID_FK` int(11) NOT NULL,
		  `CYCLE_NUMBER` int(11) NOT NULL,
		  `NAME` varchar(255) NOT NULL,
		  `UPLOADED` datetime NOT NULL,
		  `ACKNOWLEDGED` int(11) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1*/
	public function up()
	{
		Schema::create('materialreplenishment', function(Blueprint $table)
		{
			$table->increments('id');
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
		Schema::drop('materialreplenishment');
	}

}
