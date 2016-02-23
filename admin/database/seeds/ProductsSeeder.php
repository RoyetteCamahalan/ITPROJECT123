<?php 
use Illuminate\Database\Seeder;
use App\specializations;

class ProductsSeeder extends Seeder {

    public function run()
    {
        DB::table('products')->delete();

        specializations::create(['name' => 'CLOPATE 75MG FC TAB']);
        specializations::create(['name' => 'ODASYL 5MG TAB']);
        specializations::create(['name' => 'ODASYL 10MG TAB']);
        specializations::create(['name' => 'SARTAN 50MG TAB']);
        specializations::create(['name' => 'SARTAN 100MG TAB']);
        specializations::create(['name' => 'SARTAN-H 50MG/12.5MG FC TAB']);
        specializations::create(['name' => 'EXCIT 1080MG (10MEQ) TABLET']);
        specializations::create(['name' => 'FINARID 5MG TAB']);
        specializations::create(['name' => 'PIMAX 200MCG TAB']);
        specializations::create(['name' => 'PIMAX 400MCG TAB']);
        specializations::create(['name' => 'ENERAPLUS DROPS 15ML']);
        specializations::create(['name' => 'ENERAPLUS DROPS 30ML']);
        specializations::create(['name' => 'ENERAPLUS SYRUP 60ML']);
        specializations::create(['name' => 'ENERAPLUS SYRUP 120ML']);
        specializations::create(['name' => 'ENERAPLUS SYRUP 240ML']);
        specializations::create(['name' => 'ENERAPLUS FOR TEENS']);
        specializations::create(['name' => 'NAPRAN 100MG/ML ORAL DROPS']);
        specializations::create(['name' => 'NAPRAN 125MG/5ML SUSP']);
        specializations::create(['name' => 'NAPRAN 250MG/5ML SUSP']);
        specializations::create(['name' => 'L-ZET 5MG TAB']);
        specializations::create(['name' => 'L-ZET 2.5MG/5ML SYRUP']);
        specializations::create(['name' => 'ANTAL 10MG TAB']);
        specializations::create(['name' => 'BEFIDAN 500MG CAP']);
        specializations::create(['name' => 'FLEXICOF 50MG/ML DROPS 15ML']);
        specializations::create(['name' => 'FLEXICOF 100MG/5ML SYRUP 60ML']);
        specializations::create(['name' => 'FLEXICOF 100MG/5L SYRUP 120ML']);
        specializations::create(['name' => 'PROTEC PILL 150MCG/30MCG/60MG']);
        specializations::create(['name' => 'SMARTEE SYRUP 60ML']);
        specializations::create(['name' => 'SMARTEE SYRUP 120ML']);
        specializations::create(['name' => 'ZEDROXYN 100MG/ML ORALL DROPS 10ML']);
        specializations::create(['name' => 'ZEDROXYN 125MG/5ML SUSP 60ML']);
        specializations::create(['name' => 'ZEDROXYN 250MG/5ML SUSP 60ML']);
        specializations::create(['name' => 'ZEDROXYN 250MG CAP']);
        specializations::create(['name' => 'ZEDROXYN 500MG CAP']);
        specializations::create(['name' => 'ZEXANTA 500MG CAP']);
        specializations::create(['name' => 'ZIRCAM 7.5MG DROPS 15ML']);
        specializations::create(['name' => 'ZIRCAM 15MG SYRUP 60ML']);
        specializations::create(['name' => 'ZIRCAM 30MG SYRUP 60ML']);
        specializations::create(['name' => 'NATALIE PRE-NATAL CAP']);
        specializations::create(['name' => 'GENERICS']);
    }

}