<?php

namespace App\Http\Controllers;

use App\Entreprises;
use App\Metier;
use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
     
        $metier = Metier::all();
        return view('registeremploye', compact('metier'));        
    }
    //route pour créer un employe de sadarwa
    /**
     * Create a new user instance after a valid registration.
     * @return \App\User
     */
    protected function createemploye(Request $request)
    {   
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'telephone' => ['required', 'string', 'unique:users'],
        ]);
       
        $role = DB::table('roles')->where('nom', 'ADMIN')->value('id');
        $metier = request('metier');
        $entreprise = DB::table('entreprises')->where('nom_entreprise', 'SADARWAGROUP')->value('id');
        
        $user = User::create([ 
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'telephone' => $request['telephone'],
        ]);

        $user->roles()->attach($role);
        $user->metiers()->attach($metier);
        $user->entreprises()->attach($entreprise);       
        return back(); 
}
//route pour créer un userincube de l'incube qui s'est connecté
protected function createuserincube(Request $request)
{
    
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'telephone' => ['required', 'string', 'unique:users'],
        ]);
       
        $role = DB::table('roles')->where('nom', 'USERINCUBE')->value('id');
        $metier = request('metier');
        $entreprise = Entreprises::with('users')->where('id', '=', Auth::user()->id)->get();

        
        $user = User::create([ 
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'telephone' => $request['telephone'],
        ]);

        $user->roles()->attach($role);
        $user->metiers()->attach($metier);
        $user->entreprises()->attach($entreprise);
        
        return Redirect::to('/incube');
}

//liste des entreprises d'un admin connectée
public function ese(User $user){
            
    $user = User::with('entreprises')->where('id', '=', Auth::user()->id)->get();
    return view('entreprise.entrepriseconserne', compact('user'));
    
      

}
}