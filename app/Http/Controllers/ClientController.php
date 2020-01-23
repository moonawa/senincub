<?php

namespace App\Http\Controllers;

use App\Client;
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
            'nom_client' => 'required',
            'telephone' => 'required',
            'mail' => 'required',
            'secteur_id' => 'required',

        ]);
        $secteurs = Secteur::all();

        Client::create($request->all());
    
        return view('client.clientuser');

        // return Redirect::to('clients')
    //     ->with('success','Greate! client created successfully.');
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
            'nom_client' => 'required',
            'telephone' => 'required',
            'mail' => 'required',
            'secteur_id' => 'required',
        ]);
         
        $update = ['nom_client' => $request->nom_client, 'secteur_id' => $request->secteur_id];
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
  
    /**
     * Search a client.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client $client
    
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $search = $request->get('search');
        $client = DB::table('clients')->where('nom_client', 'like', '%'.$search.'%')->paginate(5);
        return view ('client.clientlist', ['clients' => $client]);
    }

    //allouer  un admin à une entreprise incubé
    public function alloue(Request $request){
            
        $email= $_GET["email"];
        $emails= $_GET["emails"];
        $post = \App\Client::whereEmail($email)->first();
        $category_id = \App\Entreprises::whereMail($emails)->first()->id;
        $post->entreprises()->attach($category_id);
        return 'weiiiiiiiiiiii';
        }
        //enlever la relation "admin - entreprise incubé"
        public function detach(Request $request){
            
            $email= $_GET["email"];
            $emails= $_GET["emails"];
            $post = \App\Client::whereEmail($email)->first();
            $category_id = \App\Entreprises::whereMail($emails)->first()->id;
            $post->entreprises()->detach($category_id);
            return 'weiiiiiiiiiiii';
            }

         /**
     * Eseuser a new user instance after a valid registration.
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $data
     * @param  \App\User $user
    
     * @return \Illuminate\Http\Response
     */

   
}
