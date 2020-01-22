<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    /**
     * The fillable attributes.
     *
     * @var string
     */
    public $fillable = ['nom'];

    /**
     * Has Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function inscris()
    {
        return $this->hasMany('App\Inscris');
    }

    public function entreprises()
    {
        return $this->hasMany('App\Entreprises');
    }

    public function clients()
    {
        return $this->hasMany('App\Clients');
    }
 
   
}