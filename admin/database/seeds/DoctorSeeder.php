<?php 
use Illuminate\Database\Seeder;
use App\doctors;

class DoctorSeeder extends Seeder {

    public function run()
    {
        DB::table('doctors')->delete();

        doctors::create(['doc_name' => 'ARROSAS, JULIE ROSE',
        			        'specialization_id_fk'=>'13',
                      'birthday'=>'',
                      'contact_number'=>'',
                      'prc_license'=>'',
                      'email'=>'',
                      'is_active'=>'1']);
        doctors::create(['doc_name' => 'LATAYAN, MICHAEL JONATHAN',
                      'specialization_id_fk'=>'16',
                      'birthday'=>'',
                      'contact_number'=>'',
                      'prc_license'=>'',
                      'email'=>'',
                      'is_active'=>'0']);
        doctors::create(['doc_name' => 'DALMACIO, ELISA',
                      'specialization_id_fk'=>'16',
                      'birthday'=>'',
                      'contact_number'=>'',
                      'prc_license'=>'',
                      'email'=>'',
                      'is_active'=>'1']);
        doctors::create(['doc_name' => 'DAYANGHIRANG, CHONA',
                      'specialization_id_fk'=>'3',
                      'birthday'=>'',
                      'contact_number'=>'',
                      'prc_license'=>'',
                      'email'=>'',
                      'is_active'=>'1']);
        doctors::create(['doc_name' => 'ZAMORAS, CATHERINE',
                      'specialization_id_fk'=>'3',
                      'birthday'=>'',
                      'contact_number'=>'',
                      'prc_license'=>'',
                      'email'=>'',
                      'is_active'=>'0']);
        doctors::create(['doc_name' => 'ESPINO, VICTOR',
                      'specialization_id_fk'=>'6',
                      'birthday'=>'',
                      'contact_number'=>'',
                      'prc_license'=>'',
                      'email'=>'',
                      'is_active'=>'1']);
        doctors::create(['doc_name' => 'GUILLERMO, SYRIL BREN',
                      'specialization_id_fk'=>'13',
                      'birthday'=>'',
                      'contact_number'=>'',
                      'prc_license'=>'',
                      'email'=>'',
                      'is_active'=>'0']);
        doctors::create(['doc_name' => 'LOBATON, RICHARD',
                      'specialization_id_fk'=>'6',
                      'birthday'=>'',
                      'contact_number'=>'',
                      'prc_license'=>'',
                      'email'=>'',
                      'is_active'=>'1']);
    }

}