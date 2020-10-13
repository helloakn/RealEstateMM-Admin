<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'Property';
    protected $fillable = ['address','finished_status','size','price','bed_room','single_bath_room','master_bath_room','advertiser','description','status','location','lat','lng'];

   // protected $fillable = ['address','finished_status','size','price','currency_id','payment_type_id','bed_room','single_bath_room','master_bath_room','advertiser','description','status','location'];
}
