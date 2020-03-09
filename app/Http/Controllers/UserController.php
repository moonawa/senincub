<?php

namespace App\Http\Controllers;

use App\Entreprises;
use App\Metier;
use App\Notifications\Rendu;
use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
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
        $data['users'] = User::orderBy('id','desc')->paginate(5);
        return view('superadmin.usersadarwa',$data);
        
    }
    /**
     * Display the specified resource.
     * @param  \App\Entreprises  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function show(Entreprises $entreprise)
    {    
            
    }
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['user_info'] = User::where($where)->first();
        return view('superadmin.useredit', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'telephone' => 'required',
            'email' => 'required',
        ]);       
        $update = ['name' => $request->name, 'telephone' => $request->telephone, 'email' => $request->email];
        User::where('id',$id)->update($update);
        return back()
       ->with('success',' Utilisateur modifié  avec succes');
    }
    public function destroy($id)
    {
        User::where('id',$id)->delete();  
        return back()->with('success','Utilisateur supprimé avec succes');
    }

    public function searchuser(Request $request){
        $search = $request->get('search');
        $entreprise = DB::table('users')->where('name', 'like', '%'.$search.'%')->paginate(5);
        return view ('superadmin.userlist', ['users' => $entreprise]);
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
        return back()->with('message', 'Employe ajouté avec succes!!!'); 
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
        
        return back()->with('message', 'membre ajouté avec succes!!!'); 
}

//liste des entreprises d'un admin connectée
public function ese(User $user){
            
    $user = User::with('entreprises')->where('id', '=', Auth::user()->id)->get();
    return view('entreprise.entrepriseconserne', compact('user'));
    
}

public function sendNotification()
    {
        $user = User::first();
  
        $details = [
            'envoyeur' => '1',
            'message' => 'This is my first notification from ItSolutionStuff.com',
            'receveur' => '2'
            
        ];
  
        Notification::send($user, new Rendu($details));
   
        dd('done');
    }

        //function recherche par nom des users
        public function rechercheUser(Request $request){
            $search = $request->get('rechercheUser');
            $user = DB::table('users')->where('name', 'like', '%'.$search.'%')->paginate(5);
            return view('superadmin.usersadarwa', ['users' => $user]);
        }
}