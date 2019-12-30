<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('utilisateurs')->insert([
            'login' => 'Moubarack',
            'password' => bcrypt( '123456'),
            'nom_complet' => 'Cheikh Moubarack Wade',
            'telephone' => '778343595',
            'mail' =>'moubarakwade@gmail.com',
            'metier' => 'Manager',
        ]);

        DB::table('roles')->insert([
            'nom' => 'SUPERADMIN',          
        ]);
         DB::table('roles')->insert([
             'nom' => 'ADMIN',          
         ]);
        // DB::table('roles')->insert([
        //     'nom' => 'INCUBE',          
        // ]);
        // DB::table('roles')->insert([
        //     'nom' => 'USERINCUBE',          
        // ]);
        DB::table('role_utilisateurs')->insert([
            'role_id' => '1', 
            'utilisateurs_id' => '1',          
        ]);

        DB::table('entreprises')->insert([
            'nom_entreprise' => 'SADARWAGROUP',
            'telephone' => '338643886',
            'mail' => 'sadarwagroup@gmail.com',
            'secteur' => 'Digital',           
        ]);
    }
}
