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
         //$this->call(UsersTableSeeder::class);
        //  DB::table('entreprises')->insert([
        //      'nom_entreprise' => 'SADARWAGROUP',
        //      'telephone' => '338643886',
        //      'mail' => 'sadarwagroup@gmail.com',
        //      'secteur_id' => '1',
                   
        //  ]);
        //  DB::table('roles')->insert([
        //     0 => ['nom' => 'SUPERADMIN'],      
        //     1 => ['nom' => 'ADMIN'],  
        //     2 => ['nom' => 'INCUBE'],
        //     3 => ['nom' => 'USERINCUBE'],                    
        //  ]);
        //  DB::table('users')->insert([
        //      'name' => 'Cheikh Moubarack Wade',
        //      'email' =>'moubarackwade@gmail.com',
        //      'password' => bcrypt( '123456'),
        //      'telephone' => '778343595',
        //  ]);
        //  DB::table('entreprises_user')->insert([
        //      'entreprises_id' => '1',    
        //      'user_id' => '1'  
        //  ]);

        //  DB::table('roles_user')->insert([
        //      'roles_id' => '1',    
        //      'user_id' => '1'  
        //  ]);
        
        
        

        //  DB::table('metiers')->insert([
        //      0 => ['nom' => 'Manager'],      
        //      1 => ['nom' => 'Développeur'],  
        //      2 => ['nom' => 'CEO'],
        //  ]);
        

        //  DB::table('metier_user')->insert([
        //      'metier_id' => '1',    
        //      'user_id' => '1'  
        //  ]);
        //  DB::table('secteurs')->insert([
        //      'nom' => 'Digital',          
        //  ]);
        DB::table('notifications')->insert([
            // 0 => [
            //     'id' => '6dd79182-0d88-48b7-8e4e-59dbf3371763',
            //     'type' => 'App\Notifications\Rendu',
            //     'notifiable_type' => 'App\User',
            //     'notifiable_id' => '1',
            //     'data' => '{"data":"sa va marcher"}'
            // ],
            // 1 => [
            //     'id' => '6e7b833c-4a12-44d5-8fbe-f542e688b865',
            //     'type' => 'App\Notifications\Rendu',
            //     'notifiable_type' => 'App\User',
            //     'notifiable_id' => '1',
            //     'data' => '{"data":"Oussou baby"}'
            // ],
            0 => [
                'id' => '6d7b833c-4a12-44d5-8fbe-f542e688b865',
                'type' => 'App\Notifications\Rendu',
                'notifiable_type' => 'App\User',
                'notifiable_id' => '1',
                'data' => '{"nom":"Cheikh Moubarack Wade","user_id":1,"message":"la derniere tentative","user_id":2}'
            ],
            1 => [
                'id' => '6l7b833c-4a12-44d5-8fbe-f542e688b865',
                'type' => 'App\Notifications\Rendu',
                'notifiable_type' => 'App\User',
                'notifiable_id' => '1',
                'data' => '{"nom":"Cheikh Moubarack Wade","user_id":1,"message":"la derniere tentative","user_id":3}'
            ],

        ]);

       
        
    }
}
