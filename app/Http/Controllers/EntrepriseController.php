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
        ]);       
        $update = ['nom_entreprise' => $request->nom_entreprise, 'telephone' => $request->telephone, 'mail' => $request->mail];
        Entreprises::where('id',$id)->update($update);
        return Redirect::to('entreprises')
       ->with('success',' Entreprise modifiée  avec succes');
    }
   
    /**
     * Remove the specified resource from storage.
     * @param  \App\Entreprises  $entreprise
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        Entreprises::where('id',$id)->delete();  
        return Redirect::to('entreprises')->with('success','Entreprise supprimée avec succes');
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
    //vue a entreprise.entrepriseuser
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
            return back()->with('success','l\'Entreprise et son Utilisateur ont été crée avec succes');
        }


        //allouer  un admin à une entreprise incubé
        //vue entreprise.entrepriseadmin
        public function alloue(Request $request){           
        $email= $_GET["name"];
        $emails= $_GET["nom_entreprise"];
        $post = \App\User::whereName($email)->first();
        $category_id = \App\Entreprises::whereNomEntreprise($emails)->get();
        $post->entreprises()->attach($category_id);
        return back()
        ->with('success',' Allocation réussit');
        }

        //enlever la relation "admin - entreprise incubé"
                //vue entreprise.entrepriseadmin
        public function detach(Request $request){         
            $email= $_GET["name"];
            $emails= $_GET["nom_entreprise"];
            $post = \App\User::whereName($email)->first();
            $category_id = \App\Entreprises::whereNomEntreprise($emails)->get();
            $post->entreprises()->detach($category_id);
            return back()
            ->with('successs','suppression de la relation avec success');
        }

        //lister les entreprises en fonction des users consernés
        public function conserné(User $categories){
            $categories = User::with('entreprises')->where('id', '=', Auth::user()->id)->paginate(3);    
            return view('entreprise.entrepriseconserne', compact('categories'));                
            
        }

        //Liste des entreprises et de leurs employés
        public function equipe(Entreprises $categories){
            $categories = \App\Entreprises::all();
            return view('user.equipe', compact('categories'));                
        }

        //liste des employés d'une entreprise connectée
        public function employess(Entreprises $entreprise){ 
            $entreprise = User::with('entreprises')->where('id', '=', Auth::user()->id)->get();  
            if(Auth::user()->roles->pluck('nom')->contains('INCUBE')) {
            return view('user.userlist', compact('entreprise')); 
        }
            else if(Auth::user()->roles->pluck('nom')->contains('USERINCUBE')) {
                return view('userincube.equipe', compact('entreprise')); 

            }   
            else if(Auth::user()->roles->pluck('nom')->contains('ADMIN')) {
                return view('admin.equipe', compact('entreprise')); 
            } 
            else{
                return view('superadmin.userlist', compact('entreprise')); 

            }                          
        }

        //liste des clients d'une entreprise connectée
        public function clientsss(User $entreprise){   
            $entreprise = User::with('entreprises')->where('id', '=', Auth::user()->id)->get();      
            if(Auth::user()->roles->pluck('nom')->contains('INCUBE')) { 
            return view('client.clientconserne', compact('entreprise'));      
            }
            else{
                return view('userincube.nosclient', compact('entreprise'));  
    
            } 
        }
        //liste des employés d'une entreprise cliquée
        public function detail($id){
            $r =Entreprises::where('id',$id)->get()->users;  
            return $r;  
        }

        public function ese(){
            $entreprise = \App\Entreprises::all();
            return view('entreprise.ensemble', compact('entreprise')); 
        }
        public function nombre(){
            $collection =  \App\Inscris::all();
            $collection->count();
            return view('superadmin');
        }
        //liste des clients d'une entreprise connectée
        public function prestationsss(User $entreprise){   
            $entreprise = User::with('entreprises')->where('id', '=', Auth::user()->id)->get();      
            if(Auth::user()->roles->pluck('nom')->contains('INCUBE')) { 
            return view('prestataire.prestataireconserne', compact('entreprise'));      
            }
            else{
                return view('userincube.nosclient', compact('entreprise'));  
    
            } 
        }
    }