<?php 
use Illuminate\Database\Seeder;
use App\materials;

class MaterialsSeeder extends Seeder {

    public function run()
    {
        DB::table('materials')->delete();

        materials::create(['name' => 'Sample']);
        materials::create(['name' => 'Literature']);
        materials::create(['name' => 'Promo Materials']);
    }

}