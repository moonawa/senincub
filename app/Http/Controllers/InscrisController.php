<?php

namespace App\Http\Controllers;

use App\Inscris;
use App\Secteur;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InscrisController extends Controller
{
    //pour les inscris


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['inscris'] = Inscris::orderBy('id','desc')->paginate(10);  
         return view('inscris.inscrislist',$data);

        // $inscris = $this->inscrisRepository->getActiveOrderByDate($this->nbrPages);
        // return view('front.index', compact('inscris'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accueil');
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
            'nom_projet' => 'required',
            'secteur_id'=> 'required'

        ]);
        /*$secteurs = Secteur::lists('nom', 'id');*/
        $secteurs = Secteur::all();
        

        $inscris= Inscris::create($request->all());
        // $inscris->secteurs()->attach($secteurs);
    
        return Redirect::to('inscris')
       ->with('success','Greate! Entreprise created successfully.');
    }

    protected function storer(array $data)
    {   
        $secteurs = Secteur::lists('nom', 'id');

        $inscris = Inscris::create([
            'nom_complet' => $data['nom_complet'],
            'telephone' => $data['telephone'],
            'mail' => $data['mail'],
            'nom_projet' => $data['nom_projet'],
        ]);

        $inscris->secteurs()->attach($secteurs);
        return $inscris;

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

    public function select(){
        
    }

  
    
}
