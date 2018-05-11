<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    // Table Name
    protected $table = 'user_locations';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\User');
    }
    
}
