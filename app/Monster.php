<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    // Table Name
    protected $table = '5e_srd_monsters';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = false;


}
