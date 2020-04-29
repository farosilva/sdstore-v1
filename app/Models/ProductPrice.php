<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    public $increments = false;

    protected $primaryKey = 'sku';
    protected $keyType = 'string';
    protected $table = 'products_price';

    protected $fillable = [
        'sku', 'table_id', 'start_date', 'price', 'status',
    ];

    protected $casts = [
        'price' => 'float',
        'start_date' => 'date:d/m/Y',
        'created_at'  => 'datetime:d/m/Y H:i:s',
        'updated_at'  => 'datetime:d/m/Y H:i:s',
    ];
}
