<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeder\UserTableSeeder;
use Database\Seeder\DoctorClassesSeeder;
use Database\Seeder\SpecializationsSeeder;
use Database\Seeder\DoctorSeeder;
use Database\Seeder\InstitutionSeeder;
use Database\Seeder\AreaSeeder;
use Database\Seeder\ProductsSeeder;
use Database\Seeder\MaterialsSeeder;
use Database\Seeder\MaterialReplenishmentSeeder;
use Database\Seeder\MaterialAllocationsSeeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->call('DoctorClassesSeeder');
		$this->call('SpecializationsSeeder');
		$this->call('DoctorSeeder');
		$this->call('InstitutionSeeder');
		$this->call('AreaSeeder');
		$this->call('ProductsSeeder');
		$this->call('MaterialsSeeder');
		$this->call('MaterialReplenishmentSeeder');
		$this->call('MaterialAllocationsSeeder');
	}

}
