<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment_Type extends Model
{
    protected $table = 'Payment_Type';
    protected $fillable = ['name','description'];

    public function scopeSearch($query , $pay)
    {
        return $query->where('name->en', 'LIKE' , '%'.$pay.'%')
                    ->orWhere('name->my', 'LIKE', '%'.$pay.'%')
                    ->orWhere('name->ch', 'LIKE', '%'.$pay.'%')
                    ->orWhere('description->en', 'LIKE', '%'.$pay.'%')
                    ->orWhere('description->my', 'LIKE', '%'.$pay.'%')
                    ->orWhere('description->ch', 'LIKE', '%'.$pay.'%');
    }
}
