<?php

namespace App\Http\Controllers;

use App\Entreprises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EntrepriseController extends Controller
{
    // public function recherche(Request $request) { 
    //     dd($request->all()); 
    // }
        

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['entreprises'] = Entreprises::orderBy('id','desc')->paginate(10);
   
        return view('entreprise.entrepriselist',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entreprise.entreprisecreat');
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
            'nom_entreprise' => 'required',
            'telephone' => 'required',
            'mail' => 'required',
            'secteur' => 'required',

        ]);
   
        Entreprises::create($request->all());
    
        return Redirect::to('entreprises')
       ->with('success','Greate! Entreprise created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Entreprises  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
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
     *
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
            'secteur' => 'required',
        ]);
         
        $update = ['nom_entreprise' => $request->nom_entreprise, 'secteur' => $request->secteur];
        Entreprises::where('id',$id)->update($update);
   
        return Redirect::to('entreprises')
       ->with('success','Great! Entreprise updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entreprises  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entreprises::where('id',$id)->delete();
   
        return Redirect::to('entreprises')->with('success','Entreprise deleted successfully');
    }
  
    public function search(Request $request){
        $searc = $request->get('entreprises.list');
        Entreprises::where('nom_entreprise', 'like', '%'.$searc.'%');
        //return view ('show', ['entreprises' => $entreprises]);
        return Redirect::to('entreprises');
    }
}
