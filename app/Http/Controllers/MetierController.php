<?php

namespace App\Http\Controllers;

use App\Metier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MetierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['metiers'] = Metier::orderBy('id','desc')->paginate(10);
         if(Auth::user()->roles->pluck('nom')->contains('SUPERADMIN')) { 

   
         return view('metier.metierlist',$data);
         }
         else{
            return view('incube.metierlist',$data);
 
         }
        $metiers = Metier::all();
        $select = [];
        foreach($metiers as $department){
            $select[$department->id] = $department->nom;
        }
        return view('metier.metierlist', compact('select'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->roles->pluck('nom')->contains('SUPERADMIN')) { 

        return view('metier.metiercreate');
        }
        else{
            return view('incube.metiercreate');

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
            'nom' => 'required',
            

        ]);
   
        Metier::create($request->all());
    
        return back()->with('success','metier ajouté avec succes.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\metiers  $metier
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Metier  $metier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['metier_info'] = Metier::where($where)->first();
        if(Auth::user()->roles->pluck('nom')->contains('SUPERADMIN')) { 

        return view('metier.metieredit', $data);
        }
        else{
            return view('incube.metieredit', $data);

         }
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Metier  $metier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            
        ]);
         
        $update = ['nom' => $request->nom,];
        Metier::where('id',$id)->update($update);
   
        return back()
       ->with('success',' metier modifié avec succes');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Metier  $metier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Metier::where('id',$id)->delete();
   
        return back()->with('success','metier supprimé avec succes');
    }
}
