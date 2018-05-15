<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{
    // Table Name
    protected $table = 'user_encounters';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\User');
    }
}
