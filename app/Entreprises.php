<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprises extends Model
{
     public function utilisateurs()
     {
         return $this->belongsToMany(Utilisateurs::class);

        
     }
}
