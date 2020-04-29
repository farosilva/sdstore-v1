<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id', 'contact_id', 'function', 'contact_name', 'phone_1', 'phone_2', 'whatsapp', 'email'
    ];
}
