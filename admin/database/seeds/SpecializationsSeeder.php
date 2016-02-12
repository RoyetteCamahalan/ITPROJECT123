<?php 
use Illuminate\Database\Seeder;
use App\specializations;

class SpecializationsSeeder extends Seeder {

    public function run()
    {
        DB::table('specializations')->delete();

        specializations::create(['name' => 'Drugstore Signatory']);
        specializations::create(['name' => 'Eye, Nose, Throat specialist']);
        specializations::create(['name' => 'Family Medicine']);
        specializations::create(['name' => 'General Practitioner']);
        specializations::create(['name' => 'Internist']);
        specializations::create(['name' => 'Cardiologist']);
        specializations::create(['name' => 'Diabetologist']);
        specializations::create(['name' => 'Endocrinologist']);
        specializations::create(['name' => 'Gastro-enterologist']);
        specializations::create(['name' => 'Nephrologist']);
        specializations::create(['name' => 'Midwife']);
        specializations::create(['name' => 'OB-Gynecologist']);
        specializations::create(['name' => 'Pediatrician']);
        specializations::create(['name' => 'Registered Nurse']);
        specializations::create(['name' => 'Surgeon']);
        specializations::create(['name' => 'Urologist']);
        specializations::create(['name' => 'AGRIVET']);
        specializations::create(['name' => 'GENERAL SURGERY']);
        specializations::create(['name' => 'RHU']);
        specializations::create(['name' => 'GENERIC']);
        specializations::create(['name' => 'IM-NEURO']);
        specializations::create(['name' => 'ROD']);
        specializations::create(['name' => 'ATTENDANCE']);
    }

}