<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Category';
    protected $fillable = ['name'];
    public function scopeSearch($query, $c)
    {
        return $query->where('name->en', 'LIKE' , '%' . $c . '%')
                    ->orWhere('name->my', 'LIKE' , '%'.$c.'%')
                    ->orWhere('name->ch', 'LIKE', '%'.$c.'%');
    }
}
