<?php 
use Illuminate\Database\Seeder;
use App\area;

class AreaSeeder extends Seeder {

    public function run()
    {
        DB::table('doctorclasses')->delete();

        area::create(['name' => 'Davao City',
        			  'description'=>'Davao City Area',
                      'assigned_employee'=>'1']);
        area::create(['name' => 'Davao Del Sur',
        			  'description'=>'Davao del Sur Area',
                      'assigned_employee'=>'1']);
        area::create(['name' => 'Compostela Valley',
        			  'description'=>'Compostela Valley except Maco',
                      'assigned_employee'=>'1']);
    }

}