<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'Feature';

    protected $fillable = ['name'];
    public function scopeSearch($query , $e)
    {
        return $query->where('name->en','LIKE','%'.$e.'%')
                    ->orWhere('name->my', 'LIKE', '%'.$e.'%')
                    ->orWhere('name->ch', 'LIKE', '%'.$e.'%');
    }
}
