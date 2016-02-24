<?php 
use Illuminate\Database\Seeder;
use App\institutions;

class InstitutionSeeder extends Seeder {

    public function run()
    {
        DB::table('institution')->delete();

        institutions::create(['name' => 'Davao Doctors Hospital',
        			        'address'=>'Quirino, Davao City',
                      'area_id'=>'1']);
        institutions::create(['name' => 'Tagum Doctors Hospital',
                      'address'=>'Tagum City',
                      'area_id'=>'1']);
        institutions::create(['name' => 'Davao Seventh Day Adventist Hospital',
                      'address'=>'Bangkal, Davao City']);
        institutions::create(['name' => 'Digos Provincial Hospital',
                      'address'=>'Digos City',
                      'area_id'=>'1']);
        institutions::create(['name' => 'Limso Hospital',
                      'address'=>'Ilustre St., Davao City',
                      'area_id'=>'1']);
    }

}