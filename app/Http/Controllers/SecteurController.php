<?php

namespace App\Http\Controllers;

use App\Secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['secteurs'] = Secteur::orderBy('id','desc')->paginate(10);
   
         return view('secteur.secteurlist',$data);

        $secteurs = Secteur::all();
        $select = [];
        foreach($secteurs as $department){
            $select[$department->id] = $department->nom;
        }
        return view('secteur.secteurlist', compact('select'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secteur.secteurcreate');
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
            'nom' => 'required',
            

        ]);
   
        Secteur::create($request->all());
    
        return Redirect::to('secteurs')
       ->with('success','Greate! secteur created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\secteurs  $secteur
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\secteurs  $secteur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['secteur_info'] = Secteur::where($where)->first();
 
        return view('secteur.secteuredit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\secteurs  $secteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            
        ]);
         
        $update = ['nom' => $request->nom,];
        Secteur::where('id',$id)->update($update);
   
        return Redirect::to('secteurs')
       ->with('success','Great! secteur updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\secteurs  $secteur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Secteur::where('id',$id)->delete();
   
        return Redirect::to('secteurs')->with('success','secteur deleted successfully');
    }
  
    public function search(Request $request){
        $searc = $request->get('secteurs.list');
        Secteur::where('nom_secteur', 'like', '%'.$searc.'%');
        //return view ('show', ['secteurs' => $secteurs]);
        return Redirect::to('secteurs');
    }
}
