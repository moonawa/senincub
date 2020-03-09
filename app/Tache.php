<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    /**
     * The fillable attributes.
     *
     * @var string
     */
    public $fillable = ['description'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
   
    public function prestataires()
    {
        return $this->belongsToMany('App\Prestataire');
    }
}
