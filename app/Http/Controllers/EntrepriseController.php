<?php

namespace App\Http\Controllers;

use App\Entreprises;
use App\Inscris;
use App\Metier;
use App\Roles;
use App\Secteur;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class EntrepriseController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['entreprises'] = Entreprises::orderBy('id','desc')->paginate(5);
        return view('entreprise.entrepriselist',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entreprise.entreprisecreat');
    }
   
   /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_entreprise' => 'required',
            'telephone' => 'required',
            'mail' => 'required',
            'secteur_id' => 'required',
        ]);
        $secteurs = Secteur::all();
        Entreprises::create($request->all());   
        return view('entreprise.entrepriseuser');
        // return Redirect::to('entreprises')
    //     ->with('success','Greate! Entreprise created successfully.');
    }
    
    /**
     * Display the specified resource.
     * @param  \App\Entreprises  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function show(Entreprises $entreprise)
    {    
            $secteurs = $entreprise->secteurs->nom;    
            return view('entreprise.entrepriselist', compact('entreprise', 'secteurs'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Entreprises  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['entreprise_info'] = Entreprises::where($where)->first();
        return view('entreprise.entrepriseedit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entreprises  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_entreprise' => 'required',
            'telephone' => 'required',
            'mail' => 'required',
            'secteur_id' => 'required',
        ]);       
        $update = ['nom_entreprise' => $request->nom_entreprise, 'secteur_id' => $request->secteur_id];
        Entreprises::where('id',$id)->update($update);
        return Redirect::to('entreprises')
       ->with('success','Great! Entreprise updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     * @param  \App\Entreprises  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entreprises::where('id',$id)->delete();  
        return Redirect::to('entreprises')->with('success','Entreprise deleted successfully');
    }
  
    /**
     * Search a entreprise.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entreprises $entreprise
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $search = $request->get('search');
        $entreprise = DB::table('entreprises')->where('nom_entreprise', 'like', '%'.$search.'%')->paginate(5);
        return view ('entreprise.entrepriselist', ['entreprises' => $entreprise]);
    }
     
    /**
     * Eseuser a new user instance after a valid registration.
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $data
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function eseuser(Request $request){            
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telephone' => ['required', 'string', 'unique:users'],
            ]);          
            $role = DB::table('roles')->where('nom', 'INCUBE')->value('id');
            $metier = DB::table('metiers')->where('nom', 'CEO')->value('id');
            $entreprise =DB::table('entreprises')->latest('id')->value('id');
            
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

        //function recherche par mail et ensuite il te transmet la lign ede user qui correspond à cet email
        public function rechercheUser(Request $request){
            $search = $request->get('rechercheUser');
            $user = DB::table('users')->where('email', 'like', '%'.$search.'%')->paginate(5);
            return view('entreprise.entrpriseadmin');
        }

        //allouer  un admin à une entreprise incubé
        public function alloue(Request $request){           
        $email= $_GET["email"];
        $emails= $_GET["emails"];
        $post = \App\User::whereEmail($email)->first();
        $category_id = \App\Entreprises::whereMail($emails)->first()->id;
        $post->entreprises()->attach($category_id);
        return Redirect::to('/super')
        ->with('success','Great! Entreprise updated successfully');
        }

        //enlever la relation "admin - entreprise incubé"
        public function detach(Request $request){         
            $email= $_GET["email"];
            $emails= $_GET["emails"];
            $post = \App\User::whereEmail($email)->first();
            $category_id = \App\Entreprises::whereMail($emails)->first()->id;
            $post->entreprises()->detach($category_id);
            return Redirect::to('/super')
            ->with('success','Great! Entreprise updated successfully');
        }

        //lister les entreprises en fonction des users consernés
        public function conserné(){
            $categories = \App\User::all();
            foreach($categories as $category) {
                echo '<strong>' . $category->name . '</strong><br>';
                foreach($category->entreprises as $post) {
                    echo $post->nom_entreprise . '<br>';
                }
            }
        }

        //Liste des entreprises et de leurs employés
        public function equipe(Entreprises $categories){
            $categories = \App\Entreprises::all();
            return view('user.equipe', compact('categories'));                

        }

        //liste des employés d'une entreprise connectée
        public function employess(Entreprises $entreprise){ 
            $entreprise = User::with('entreprises')->where('id', '=', Auth::user()->id)->paginate(3);    
            return view('user.userlist', compact('entreprise'));                
                       
        }

        //liste des clients d'une entreprise connectée
        public function clientsss(User $entreprise){   
            $entreprise = User::with('entreprises')->where('id', '=', Auth::user()->id)->get();       
            return view('client.clientconserne', compact('entreprise'));      
            
        }
    }