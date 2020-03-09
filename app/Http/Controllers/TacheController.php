<?php

namespace App\Http\Controllers;

use App\Entreprises;
use App\Tache;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['taches'] = Tache::orderBy('id','desc')->paginate(10);
         if(Auth::user()->roles->pluck('nom')->contains('SUPERADMIN')) { 

         return view('tache.tachelist',$data);
         }
         else{
            return view('incube.tachelist',$data);
 
         }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->roles->pluck('nom')->contains('SUPERADMIN')) { 

        return view('tache.tachecreate');
        }
        else{
            return view('incube.tachecreate');
 
         }

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
            'description' => 'required',
        ]);
   
        $tache= Tache::create($request->all());
        $tache->users()->attach($request->cats);
        return Redirect::to('taches')
       ->with('success',' Tache crée avec succes.');
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Taches  $Tache
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }

    /**
     * Show the form for editing the specified resource.

     * @param  \App\Taches  $Tache
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['tache_info'] = Tache::where($where)->first();
 
        return view('tache.tacheedit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Taches  $Tache
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            
        ]);
         
        $update = ['description' => $request->description,];
        Tache::where('id',$id)->update($update);
   
        return Redirect::to('taches')
       ->with('success',' Tache modifié avec succes ');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tache::where('id',$id)->delete();   
        return Redirect::to('taches')->with('success','Tache supprimé avec succes');
    }
  
    public function search(Request $request){
        $searc = $request->get('taches.list');
        Tache::where('description', 'like', '%'.$searc.'%');
        //return view ('show', ['Taches' => $Taches]);
        return Redirect::to('taches');
    }
    //allouer  une tache à un user
    //vue a tache.tacheuser 
    public function tacheuser(Request $request){  
        $name = $_GET['name'];
        $des = $_GET['description'];

    $post = User::whereName($name)->first();
    $category_id = Tache::whereDescription($des)->get();
    $post->taches()->attach($category_id);
        return back()
        ->with('success',' Tache allouée réussit');
    }

    public function detach(Request $request){  
        $name = $_GET['name'];
        $des = $_GET['description'];

    $post = User::whereName($name)->first();
    $category_id = Tache::whereDescription($des)->get();
    $post->taches()->detach($category_id);
        return back()
        ->with('success',' Tache allouée supprimée');
    }

    //allouer  une tache à un user
    //vue a tache.tacheuserentreprise 
    public function entreprisetacheuser(Request $request){  
        $name = $_GET['id'];
        $des = $_GET['nom_entreprise'];

    $tacheuser = DB::table('tache_user')->whereId($name)->first();;
    $entreprise = Entreprises::whereNomEntreprise($des)->get();
    $tacheuser->taches()->attach($entreprise);
        return back()
        ->with('success',' Tache allouée réussit');
    }
}


