<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateurs extends Model
{
     public function entreprises()
     {
         return $this->belongsToMany(Entreprises::class);
     }

     public function role()
     {
        return $this->belongsToMany(Role::class);
     }
}
