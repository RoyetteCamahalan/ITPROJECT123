<?php 
use Illuminate\Database\Seeder;
use App\materialreplenishment;

class MaterialReplenishmentSeeder extends Seeder {

    public function run()
    {
        DB::table('materialreplenishment')->delete();

        materialreplenishment::create(['product_id_fk' => '1',
        			  'material_id_fk'=>'1',
                      'material_count'=>'50',
                      'created_at'=>'2016-03-05 15:59:10']);
        materialreplenishment::create(['product_id_fk' => '4',
                      'material_id_fk'=>'2`',
                      'material_count'=>'13',
                      'created_at'=>'2016-03-05 16:00:39']);
        materialreplenishment::create(['product_id_fk' => '7',
                      'material_id_fk'=>'3',
                      'material_count'=>'30',
                      'created_at'=>'2016-03-05 15:59:10']);
    }

}