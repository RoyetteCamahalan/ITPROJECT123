<?php 
use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(['fname' => 'Royette',
        			  'mname'=>'Masayao',
                      'lname'=>'Camahalan',
                      'email'=>'abcd@gmail.com',
                      'password'=>'$2y$10$QQO4Vdy3ShnKs1YagqZwV.1V8dGxYln2dtQzldPgEY6oZW5coAlxC',
                      'position'=>'SVS',
                      'access_level'=>'2',
                      'mname'=>'Masayao',
                      'mname'=>'Masayao',
                      'branch_id'=>'1']);
    }

}