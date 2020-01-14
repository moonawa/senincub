<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprises extends Model
{
    protected $fillable = [
        'nom_entreprise',
        'telephone',
        'mail',
        'secteur',
       
       ];
    /**
     * The users that belong to the entreprise.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
