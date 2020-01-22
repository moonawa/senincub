<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscris extends Model
{


    protected $fillable = [
        'nom_complet',
        'telephone',
        'mail',
        'nom_projet',
        'secteur_id'
       ];
    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function secteurs()
    {
        return $this->belongsTo('App\Secteur');
    }
}
