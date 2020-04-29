<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryCity extends Model
{
    protected $table = 'delivery_cities';
    protected $primaryKey = 'ibge_id';

    protected $fillable = [
        'ibge_id', 'city_name', 'status',
    ];
}
