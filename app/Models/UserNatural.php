<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNatural extends Model
{
    protected $table = 'users_natural';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'birth_date', 'genre'
    ];

    protected $hidden = [
        'user_id'
    ];

    protected $casts = [
        'birth_date'  => 'date:d/m/Y',
    ];

}
