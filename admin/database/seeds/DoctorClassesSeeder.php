<?php 
use Illuminate\Database\Seeder;
use App\doctorclasses;

class DoctorClassesSeeder extends Seeder {

    public function run()
    {
        DB::table('doctorclasses')->delete();

        doctorclasses::create(['name' => 'All Class',
        			  'max_visit'=>'0']);
        doctorclasses::create(['name' => 'Class A',
        			  'max_visit'=>'4']);
        doctorclasses::create(['name' => 'CLASS B',
        			  'max_visit'=>'2']);
        doctorclasses::create(['name' => 'CLASS C',
        			  'max_visit'=>'2']);
        doctorclasses::create(['name' => 'Generic',
        			  'max_visit'=>'15']);
        doctorclasses::create(['name' => 'Attendance',
        			  'max_visit'=>'15']);
    }

}