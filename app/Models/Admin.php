<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    protected $table = 'Admin';
    protected $fillable = ['type','name','email','password','profile_image'];
    /*public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }*/
    public function scopeSearch($query, $admin)
    {
        return $query->where('name','LIKE' , '%' . $admin . '%')
                    ->orWhere('email','LIKE', '%'. $admin . '%');
    }
}
