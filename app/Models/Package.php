<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $primaryKey = 'pack_id';
    public $timestamps = false;

    protected $casts = [
        'weight'    => "Float"
    ];
}
