<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprises extends Model
{
    protected $fillable = [
        'nom_entreprise',
        'telephone',
        'mail',
        'secteur_id',
       
       ];
    /**
     * The users that belong to the entreprise.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function secteurs()
    {
        return $this->belongsTo('App\Secteur');
    }
    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }
}
