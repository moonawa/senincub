<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'telephone'
    ];

    /**entreprises
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * The metier that belong to the user.
     */
    public function metiers()
    {
        return $this->belongsToMany('App\Metier');
    }

    /**
     * The entreprises that belong to the user.
     */
    public function entreprises()
    {
        return $this->belongsToMany('App\Entreprises');
    }
    
    public function roles()
    {
        return $this->belongsToMany('App\Roles');
    }
    public function taches()
    {
        return $this->belongsToMany('App\Tache');
    }
}
