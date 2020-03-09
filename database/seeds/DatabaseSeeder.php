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
          $secteur = DB::table('secteurs')->insert([
              'nom' => 'Digital',      
             ]);

            $ese = DB::table('entreprises')->insert([
               'nom_entreprise' => 'SADARWAGROUP',
               'telephone' => '338643886',
               'mail' => 'sadarwagroup@gmail.com',
               'secteur_id' => $secteur,
                   
           ]);
            $role=  DB::table('roles')->insert([
                'nom' => 'SUPERADMIN',      
                                
           ]);
          $user =  DB::table('users')->insert([
               'name' => 'Cheikh Moubarack Wade',
               'email' =>'moubarackwade@gmail.com',
               'password' => bcrypt( '123456'),
               'telephone' => '778343595',
           ]);
          $metier =  DB::table('metiers')->insert([
            'nom' => 'Manager',      
             
         ]);
        //    DB::table('entreprises_user')->insert([
        //        'entreprises_id' => $ese,    
        //        'user_id' => $user  
        //    ]);

        //    DB::table('roles_user')->insert([
        //        'roles_id' => $role,    
        //        'user_id' => $user  
        //    ]);
        
        //    DB::table('metier_user')->insert([
        //        'metier_id' => $metier,    
        //        'user_id' => $user  
        //    ]);
          
        DB::table('notifications')->insert([
             0 => [
                 'id' => '6dd79182-0d88-48b7-8e4e-59dbf3371763',
                 'type' => 'App\Notifications\Rendu',
                 'notifiable_type' => 'App\User',
                 'notifiable_id' => '1',
                 'data' => '{"data":"Bienvenu"}'
             ],
             1 => [
                 'id' => '6e7b833c-4a12-44d5-8fbe-f542e688b865',
                 'type' => 'App\Notifications\Rendu',
                 'notifiable_type' => 'App\User',
                 'notifiable_id' => '1',
                 'data' => '{"data":"votre incubateur virtuel"}'
             ],
           

        ]);

       
        
    }
}
