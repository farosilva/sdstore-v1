<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $primaryKey = 'subscriber_id';

    protected $fillable = [
        'name', 'email', 'email_verified_at', 'whatsapp', 'user_id', 'status',
    ];
}
