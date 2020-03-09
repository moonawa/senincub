<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    protected $fillable = [
        'nom_complet',
        'telephone',
        'mail',
        'secteur_id',
       
       ];

    public function secteurs(){
        return $this->belongsTo('App\Secteur');
    }
    public function entreprises()
    {
        return $this->belongsToMany('App\Entreprises');
    }
    public function taches()
    {
        return $this->belongsToMany('App\Tache');
    }
}
