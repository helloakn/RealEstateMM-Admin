<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $table = 'Street';
    protected $fillable = ['name'];
    public function scopeSearch($query, $s)
    {
        return $query->where('name->en', 'LIKE', '%'.$s.'%')
                    ->orWhere('name->my', 'LIKE', '%'.$s.'%')
                    ->orWhere('name->ch', 'LIKE', '%'.$s.'%');
    }
}
