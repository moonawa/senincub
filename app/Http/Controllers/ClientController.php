<?php

namespace App\Http\Controllers;

use App\Client;
use App\Entreprises;
use App\Secteur;
use Illuminate\Http\Request;
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
        $data['clients'] = Client::orderBy('id','desc')->paginate(10);
   
        return view('client.clientlist',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.clientcreat');
    }
   
    /**
     * Store a newly created resource in storage.
     *
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
        $secteurs = Secteur::all();      
        $entreprise = Entreprises::all() ;
        $entreprise = request('entreprise');

        $client = Client::create($request->all());
        $client->entreprises()->attach($entreprise);
        return Redirect::to('clients')->with('success','client create successfully');

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
   
        return Redirect::to('clients')
       ->with('success','Great! client updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::where('id',$id)->delete();
   
        return Redirect::to('clients')->with('success','client deleted successfully');
    }
  
     
    //allouer  un client à une entreprise incubé
    public function clientese(Request $request){
        
    $email= $_GET["email"];
    $emails= $_GET["emails"];
    $post = \App\Client::whereMail($email)->first();
    $category_id = \App\Entreprises::whereMail($emails)->first()->id;
    $post->entreprises()->attach($category_id);
    return 'weiiiiiiiiiiii';
    }
    //enlever la relation "admin - entreprise incubé"
    public function detachclientese(Request $request){
        
        $email= $_GET["email"];
        $emails= $_GET["emails"];
        $post = \App\Client::whereMail($email)->first();
        $category_id = \App\Entreprises::whereMail($emails)->first()->id;
        $post->entreprises()->detach($category_id);
        return 'weiiiiiiiiiiii';
        }
   
}
