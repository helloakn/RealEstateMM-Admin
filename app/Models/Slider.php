<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'Slider';
    protected $fillable = ['name','description'];
    public function scopeSearch($query, $slide)
    {
        return $query->where('name', 'LIKE' , '%'.$slide.'%')
                    ->orWhere('description', 'LIKE', '%'.$slide.'%');
    }
}
