<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room_Type extends Model
{
    protected $table = 'Room_Type';
    protected $fillable = ['name'];
    public function scopeSearch($query, $room)
    {
        return $query->where('name->en', 'LIKE', '%'.$room.'%')
                            ->orWhere('name->my', 'LIKE', '%'.$room.'%')
                            ->orWhere('name->ch', 'LIKE', '%'.$room.'%');
    }
}
