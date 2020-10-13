<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'Currency';
    protected $fillable = ['name','unit'];
    public function scopeSearch($query , $cur)
    {
        return $query->where("name->en", "LIKE" , "%" . $cur . "%")
                    ->orWhere("name->my", "LIKE", "%".$cur."%")
                    ->orWhere("name->ch", "LIKE", "%".$cur."%")
                    ->orWhere("unit->en", "LIKE", "%".$cur."%")
                    ->orWhere("unit->my", "LIKE", "%".$cur."%")
                    ->orWhere("unit->ch", "LIKE", "%".$cur."%");
    }
}
