<?php 
use Illuminate\Database\Seeder;
use App\materialallocations;

class MaterialAllocationsSeeder extends Seeder {

    public function run()
    {
        DB::table('materialallocations')->delete();

        materialallocations::create(['material_map_fk' => '1',
                      'product_id_fk' => '1',
        			        'material_id_fk'=>'1',
                      'material_count'=>'10',
                      'created_at'=>'2016-03-05 15:59:10']);
        materialallocations::create(['material_map_fk' => '3',
                      'product_id_fk' => '4',
                      'material_id_fk'=>'2',
                      'material_count'=>'3',
                      'created_at'=>'2016-03-05 16:00:39']);
        materialallocations::create(['material_map_fk' => '4',
                      'product_id_fk' => '7',
                      'material_id_fk'=>'3',
                      'material_count'=>'15',
                      'created_at'=>'2016-03-05 15:59:10']);
    }

}