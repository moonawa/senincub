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
        DB::table('entreprises')->insert([
            'nom_entreprise' => 'SADARWAGROUP',
            'telephone' => '338643886',
            'mail' => 'sadarwagroup@gmail.com',
            'secteur_id' => '1',
                   
        ]);
        DB::table('roles')->insert([
            'nom' => 'SUPERADMIN',          
        ]);
        DB::table('users')->insert([
            'name' => 'Cheikh Moubarack Wade',
            'email' =>'moubarackwade@gmail.com',
            'password' => bcrypt( '123456'),
            'telephone' => '778343595',
        ]);
        DB::table('entreprises_user')->insert([
            'entreprises_id' => '1',    
            'user_id' => '1'  
        ]);

        DB::table('roles_user')->insert([
            'roles_id' => '1',    
            'user_id' => '1'  
        ]);
        
        DB::table('roles')->insert([
            'nom' => 'ADMIN',          
        ]);
        DB::table('roles')->insert([
            'nom' => 'INCUBE',          
        ]);
        DB::table('roles')->insert([
            'nom' => 'USERINCUBE',          
        ]);
        

        DB::table('metiers')->insert([
            'nom' => 'Manager',          
        ]);
        DB::table('metiers')->insert([
            'nom' => 'Developpeur',          
        ]);

        DB::table('metier_user')->insert([
            'metier_id' => '1',    
            'user_id' => '1'  
        ]);
        DB::table('secteurs')->insert([
            'nom' => 'Digital',          
        ]);
        
       
        
    }
}
