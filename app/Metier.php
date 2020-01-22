<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{

     /**
     * The fillable attributes.
     *
     * @var string
     */
    public $fillable = ['nom'];
    /**
     * The users that belong to the metier.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
