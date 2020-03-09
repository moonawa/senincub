<?php

namespace App\Http\Controllers;

use App\Entreprises;
use App\Prestataire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['prestataires'] = Prestataire::orderBy('id','desc')->paginate(5);

        return view('prestataire.prestatairelist',$data);
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->roles->pluck('nom')->contains('SUPERADMIN')) { 
        return view('prestataire.prestatairecreat');
        }
        else{
            return view('incube.prestatairecreate'); 
         }
    }
   
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprises $ese)
    {
        $request->validate([
            'nom_complet' => 'required',
            'telephone' => 'required',
            'mail' => 'required',
            'secteur_id' => 'required',

        ]);
        $prestataire = Prestataire::create($request->all());
        if(Auth::user()->roles->pluck('nom')->contains('SUPERADMIN')) { 
            $prestataire->entreprises()->attach($request->cats);
            return back()->with('success','prestataire crée avec succes');
        }
        elseif(Auth::user()->roles->pluck('nom')->contains('INCUBE')) {
            $entreprise = User::
            $o = $entreprise->$ese->id;  

            $prestataire->entreprises()->attach($o);
            return back()->with('success','prestataire crée avec succes');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Prestataire  $prestataire
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestataire  $prestataire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['prestataire_info'] = Prestataire::where($where)->first();
 
        return view('prestataire.prestataireedit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestataire  $prestataire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_complet' => 'required',
            'telephone' => 'required',
            'mail' => 'required',
            'secteur_id' => 'required',
        ]);
         
        $update = ['nom_complet' => $request->nom_complet, 'secteur_id' => $request->secteur_id];
        Prestataire::where('id',$id)->update($update);
   
        return back()->with('success',' prestataire modifié avec succes');
    }
   
    /**
     * Remove the specified resource from storage.
     * @param  \App\Prestataire  $prestataire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prestataire::where('id',$id)->delete();
   
        return back()->with('success','prestataire supprimé avec  succes');
    }
  
     
    //allouer  un prestataire à une entreprise incubé
    //vue a prestataire.prestataireentreprise
    public function prestataireese(Request $request){
        
    $email= $_GET["nom_complet"];
    $emails= $_GET["nom_entreprise"];
    $post = \App\Prestataire::whereNomComplet($email)->first();
    $category_id = \App\Entreprises::whereNomEntreprise($emails)->get();
    $post->entreprises()->attach($category_id);
    return back()->with('success','Allocation Réussit');
    }
    //enlever la relation "admin - entreprise incubé"
        //vue a prestataire.prestataireentreprise
    public function detachprestataireese(Request $request){        
        $email= $_GET["nom_complet"];
        $emails= $_GET["nom_entreprise"];
        $post = \App\Prestataire::whereNomComplet($email)->first();
        $category_id = \App\Entreprises::whereNomEntreprise($emails)->get();
        $post->entreprises()->detach($category_id);
        return back()->with('success','Suppression de la relation Réussit');
        }
        public function searchprestataire(Request $request){
            $search = $request->get('searchprestataire');
            $entreprise = DB::table('prestataires')->where('nom_complet', 'like', '%'.$search.'%')->paginate(5);
            return view ('prestataire.prestatairelist', ['prestataires' => $entreprise]);
        }
        public function ese(){
            $entreprise = \App\Prestataire::all();
            return view('prestataire.ensemble', compact('entreprise')); 
        }
}
