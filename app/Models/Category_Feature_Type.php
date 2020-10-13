<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_Feature_Type extends Model
{
    protected $table = 'Category_Feature_Type';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id','feature_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];

}
