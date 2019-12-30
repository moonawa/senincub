<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Inscris;
use App\Role;
use App\Utilisateurs;

class Users extends Controller
{
    // function dbCheck(){
    //    return $user=DB::user('User')->get(); 
    //      //print_r($user);
    //     //echo "hello world!!!!";
    //     //return $user;
        
    // }
    //public function index(){
        //echo 'code will be here';
    //}
    // function save(Request $request){
    //     $inscris = new Inscris();
    //     $inscris->nom = $request->nom;
    //     $inscris->tel = $request->tel;
    //     $inscris->email = $request->email;
    //     $inscris->projet = $request->projet;
    //     $inscris->secteur = $request->secteur;
    //     echo $inscris->save();
    // }

    public function create(Request $request)
    {
        $user = new Utilisateurs();
        $user->login = 'Moubarack';
        $user->password='123456';    
        $user->nom_complet='Cheikh Moubarack Wade';
        $user->telephone='778343595';    
        $user->mail='moubarakwade@gmail.com';
        $user->metier='Manager';    
        //$user->status='Pas de status';
        $user->save(); 
        
        $role = Role::find([1, 2]);
        $user->role()->attach($role); 
        return 'Success';
    }
}
 