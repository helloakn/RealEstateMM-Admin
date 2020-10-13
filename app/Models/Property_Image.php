<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property_Image extends Model
{
    protected $table = 'Property_Image';
    protected $fillable = ['image','type'];
}
