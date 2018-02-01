<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dailynav extends Model
{
    protected $fillable = [
        'date', 'sheme_id', 'units','nav',
    ];
}
