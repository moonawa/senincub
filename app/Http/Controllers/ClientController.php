<?php

namespace App\Http\Controllers;

use App\Client;
use App\Entreprises;
use App\Secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['clients'] = Client::orderBy('id','desc')->paginate(5);
   
        return view('client.clientlist',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->roles->pluck('nom')->contains('SUPERADMIN')) { 
        return view('client.clientcreat');
        }
        else{
            return view('incube.clientcreat'); 
         }
    }
   
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_complet' => 'required',
            'telephone' => 'required',
            'mail' => 'required',
            'secteur_id' => 'required',

        ]);
        $client = Client::create($request->all());
        $client->entreprises()->attach($request->cats);
        return back()->with('success','client crée avec succes');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['client_info'] = Client::where($where)->first();
 
        return view('client.clientedit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\clients  $client
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
        Client::where('id',$id)->update($update);
   
        return back()->with('success',' client modifié avec succes');
    }
   
    /**
     * Remove the specified resource from storage.
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::where('id',$id)->delete();
   
        return back()->with('success','client supprimé avec  succes');
    }
  
     
    //allouer  un client à une entreprise incubé
    //vue a client.cliententreprise
    public function clientese(Request $request){
        
    $email= $_GET["nom_complet"];
    $emails= $_GET["nom_entreprise"];
    $post = \App\Client::whereNomComplet($email)->first();
    $category_id = \App\Entreprises::whereNomEntreprise($emails)->get();
    $post->entreprises()->attach($category_id);
    return back()->with('success','Allocation Réussit');
    }
    //enlever la relation "admin - entreprise incubé"
        //vue a client.cliententreprise
    public function detachclientese(Request $request){        
        $email= $_GET["nom_complet"];
        $emails= $_GET["nom_entreprise"];
        $post = \App\Client::whereNomComplet($email)->first();
        $category_id = \App\Entreprises::whereNomEntreprise($emails)->get();
        $post->entreprises()->detach($category_id);
        return back()->with('success','Suppression de la relation Réussit');
        }
        public function searchclient(Request $request){
            $search = $request->get('searchclient');
            $entreprise = DB::table('clients')->where('nom_complet', 'like', '%'.$search.'%')->paginate(5);
            return view ('client.clientlist', ['clients' => $entreprise]);
        }
        public function ese(){
            $entreprise = \App\Client::all();
            return view('client.ensemble', compact('entreprise')); 
        }
}
