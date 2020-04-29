<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBusiness extends Model
{
    protected $table = 'users_business';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'ie', 'is_contributor'
    ];

    protected $casts = [
        'is_contributor' => 'boolean',
    ];
}
