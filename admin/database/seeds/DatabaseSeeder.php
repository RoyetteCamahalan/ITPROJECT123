<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeder\UserTableSeeder;
use Database\Seeder\DoctorClassesSeeder;
use Database\Seeder\SpecializationsSeeder;
use Database\Seeder\DoctorSeeder;
use Database\Seeder\InstitutionSeeder;
use Database\Seeder\AreaSeeder;
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
	}

}