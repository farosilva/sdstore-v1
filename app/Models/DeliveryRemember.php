<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryRemember extends Model
{
    protected $table = 'delivery_remembers';
    protected $primaryKey = 'seq';
    public $timestamps = false;

    protected $fillable = [
        'email', 'post_code', 'city_code' , 'last_send_at', 'send_counter',
    ];
}
