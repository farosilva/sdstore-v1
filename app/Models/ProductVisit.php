<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVisit extends Model
{
    protected $table = 'products_visit';
    protected $primaryKey = 'sku';
    public $timestamps = ['created_at'];

    protected $fillable = [
        'visit_id', 'sku', 'user_id', 'ip_address', 'created_at'
    ];

    protected $casts = [
        'created_at'  => 'datetime:d/m/Y H:i:s',
    ];
}
