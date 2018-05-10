<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    // Table Name
    protected $table = 'user_notes';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    
}
