<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
   
    /**
     * Has Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
