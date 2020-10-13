<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State_Division extends Model
{
    protected $table = 'State_Division';
    protected $fillable = ['name'];
    public function scopeSearch($query , $std)
    {
        return $query->where('name->en', 'LIKE' , '%'.$std.'%')
                    ->orWhere('name->my', 'LIKE', '%'.$std.'%')
                    ->orWhere('name->ch', 'LIKE', '%'.$std.'%');
    }
}
