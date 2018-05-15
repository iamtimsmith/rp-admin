<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notes() {
        return $this->hasMany('App\Note');
    }
    public function locations() {
        return $this->hasMany('App\Location');
    }
    public function party() {
        return $this->hasMany('App\Char');
    }
    public function npcs() {
        return $this->hasMany('App\NPC');
    }
    public function encounters() {
        return $this->hasMany('App\Encounter');
    }
}
