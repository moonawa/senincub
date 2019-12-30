<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     public function utilisateurs()
     {
         return $this->belongsToMany(Utilisateurs::class);
     }
}
