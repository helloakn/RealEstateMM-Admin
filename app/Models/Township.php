<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $table = 'Township';
    protected $fillable = ['state_division_id','name','lat','lag'];

    public function scopeSearch($query, $tws)
    {
        return $query->where("name->en", "LIKE" , "%".$tws."%")
            ->orWhere("name->my", "LIKE", "%".$tws."%")
            ->orWhere("name->ch", "LIKE", "%".$tws."%")
            ->orWhere("state_division_id", "LIKE", "%".$tws."%");
    }
}
