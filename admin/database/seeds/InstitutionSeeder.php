<?php 
use Illuminate\Database\Seeder;
use App\institutions;

class InstitutionSeeder extends Seeder {

    public function run()
    {
        DB::table('institution')->delete();

        institutions::create(['name' => 'Davao Doctors Hospital',
        			        'address'=>'Quirino, Davao City']);
        institutions::create(['name' => 'Tagum Doctors Hospital',
                      'address'=>'Tagum City']);
        institutions::create(['name' => 'Davao Seventh Day Adventist Hospital',
                      'address'=>'Bangkal, Davao City']);
        institutions::create(['name' => 'Digos Provincial Hospital',
                      'address'=>'Digos City']);
        institutions::create(['name' => 'Limso Hospital',
                      'address'=>'Ilustre St., Davao City']);
    }

}