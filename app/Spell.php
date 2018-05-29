<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    // Table Name
    protected $table = '5e_srd_spells';

    // Primary Key
    public $primaryKey = 'name';
    public $incrementing = false;

    // Timestamps
    public $timestamps = false;
}
