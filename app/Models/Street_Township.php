<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Street_Township extends Model
{
    protected $table = 'Street_Township';
    protected $fillable = ['street_id','township_id'];
}
