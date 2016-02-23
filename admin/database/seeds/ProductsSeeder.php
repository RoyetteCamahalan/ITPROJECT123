<?php 
use Illuminate\Database\Seeder;
use App\products;

class productsSeeder extends Seeder {

    public function run()
    {
        DB::table('products')->delete();

        products::create(['name' => 'CLOPATE 75MG FC TAB']);
        products::create(['name' => 'ODASYL 5MG TAB']);
        products::create(['name' => 'ODASYL 10MG TAB']);
        products::create(['name' => 'SARTAN 50MG TAB']);
        products::create(['name' => 'SARTAN 100MG TAB']);
        products::create(['name' => 'SARTAN-H 50MG/12.5MG FC TAB']);
        products::create(['name' => 'EXCIT 1080MG (10MEQ) TABLET']);
        products::create(['name' => 'FINARID 5MG TAB']);
        products::create(['name' => 'PIMAX 200MCG TAB']);
        products::create(['name' => 'PIMAX 400MCG TAB']);
        products::create(['name' => 'ENERAPLUS DROPS 15ML']);
        products::create(['name' => 'ENERAPLUS DROPS 30ML']);
        products::create(['name' => 'ENERAPLUS SYRUP 60ML']);
        products::create(['name' => 'ENERAPLUS SYRUP 120ML']);
        products::create(['name' => 'ENERAPLUS SYRUP 240ML']);
        products::create(['name' => 'ENERAPLUS FOR TEENS']);
        products::create(['name' => 'NAPRAN 100MG/ML ORAL DROPS']);
        products::create(['name' => 'NAPRAN 125MG/5ML SUSP']);
        products::create(['name' => 'NAPRAN 250MG/5ML SUSP']);
        products::create(['name' => 'L-ZET 5MG TAB']);
        products::create(['name' => 'L-ZET 2.5MG/5ML SYRUP']);
        products::create(['name' => 'ANTAL 10MG TAB']);
        products::create(['name' => 'BEFIDAN 500MG CAP']);
        products::create(['name' => 'FLEXICOF 50MG/ML DROPS 15ML']);
        products::create(['name' => 'FLEXICOF 100MG/5ML SYRUP 60ML']);
        products::create(['name' => 'FLEXICOF 100MG/5L SYRUP 120ML']);
        products::create(['name' => 'PROTEC PILL 150MCG/30MCG/60MG']);
        products::create(['name' => 'SMARTEE SYRUP 60ML']);
        products::create(['name' => 'SMARTEE SYRUP 120ML']);
        products::create(['name' => 'ZEDROXYN 100MG/ML ORALL DROPS 10ML']);
        products::create(['name' => 'ZEDROXYN 125MG/5ML SUSP 60ML']);
        products::create(['name' => 'ZEDROXYN 250MG/5ML SUSP 60ML']);
        products::create(['name' => 'ZEDROXYN 250MG CAP']);
        products::create(['name' => 'ZEDROXYN 500MG CAP']);
        products::create(['name' => 'ZEXANTA 500MG CAP']);
        products::create(['name' => 'ZIRCAM 7.5MG DROPS 15ML']);
        products::create(['name' => 'ZIRCAM 15MG SYRUP 60ML']);
        products::create(['name' => 'ZIRCAM 30MG SYRUP 60ML']);
        products::create(['name' => 'NATALIE PRE-NATAL CAP']);
        products::create(['name' => 'GENERICS']);
    }

}